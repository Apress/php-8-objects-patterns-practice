<?php

namespace popp\ch18\batch04\woo\controller;

use popp\ch18\batch04\woo\command\Command;
use popp\ch18\batch04\woo\command\DefaultCommand;
use popp\ch18\batch04\woo\base\AppException;

class AppController
{
    private static $base_cmd = null;
    private static $default_cmd = null;
    private $controllerMap;
    private $invoked = [];
    private $package = "\\popp\\ch18\\batch04\\woo\\command";

    public function __construct(ControllerMap $map)
    {
        $this->controllerMap = $map;

        if (is_null(self::$base_cmd)) {
            self::$base_cmd = new \ReflectionClass("{$this->package}\\Command");
            self::$default_cmd = new \popp\ch18\batch04\woo\command\DefaultCommand();
        }
    }

    public function reset()
    {
        $this->invoked = array();
    }

    public function getView(Request $req)
    {
        $view = $this->getResource($req, "View");

        return $view;
    }

    private function getForward(Request $req)
    {
        $forward = $this->getResource($req, "Forward");

        if ($forward) {
            $req->setProperty('cmd', $forward);
        }

        return $forward;
    }

    private function getResource(Request $req, $res)
    {
        $cmd_str = $req->getProperty('cmd');
        $previous = $req->getLastCommand();
        $status = $previous->getStatus();

        if (! isset($status) || ! is_int($status)) {
            $status = 0;
        }

        $acquire = "get$res";
        $resource = $this->controllerMap->$acquire($cmd_str, $status);

        if (is_null($resource)) {
            $resource = $this->controllerMap->$acquire($cmd_str, 0);
        }

        if (is_null($resource)) {
            $resource = $this->controllerMap->$acquire('default', $status);
        }

        if (is_null($resource)) {
            $resource = $this->controllerMap->$acquire('default', 0);
        }

        return $resource;
    }

    public function getCommand(Request $req)
    {
        $previous = $req->getLastCommand();

        if (is_null($previous)) {
            $cmd = $req->getProperty('cmd');
            if (is_null($cmd)) {
                $req->setProperty('cmd', 'default');

                return  self::$default_cmd;
            }
        } else {
            $cmd = $this->getForward($req);

            if (is_null($cmd)) {
                return null;
            }
        }

        $cmd_obj = $this->resolveCommand($cmd);

        if (is_null($cmd_obj)) {
            throw new AppException("couldn't resolve '$cmd'");
        }

        $cmd_class = get_class($cmd_obj);

        if (isset($this->invoked[$cmd_class])) {
            throw new AppException("circular forwarding");
        }

        $this->invoked[$cmd_class] = 1;

        return $cmd_obj;
    }

    public function resolveCommand($cmd)
    {
        $classroot = $this->controllerMap->getClassroot($cmd);
        //$filepath = "woo/command/$classroot.php";
        $classname = "{$this->package}\\$classroot";
        //use $classname;
        //if (file_exists($filepath)) {
        //    require_once($filepath);
        if (class_exists($classname)) {
            $cmd_class = new \ReflectionClass($classname);
            if ($cmd_class->isSubClassOf(self::$base_cmd)) {
                return $cmd_class->newInstance();
            }
        }
        //}

        return null;
    }
}
