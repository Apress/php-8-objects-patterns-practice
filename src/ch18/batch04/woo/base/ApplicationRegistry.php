<?php

declare(strict_types=1);

namespace popp\ch18\batch04\woo\base;

use popp\ch18\batch04\woo\controller\Request;
use popp\ch18\batch04\woo\controller\AppController;
use popp\ch18\batch04\woo\controller\ControllerMap;

class ApplicationRegistry extends Registry
{
    private static $instance = null;
    private $freezedir = __DIR__ . "/../../data";
    private $values = array();
    private $mtimes = array();

    private $request = null;

    private function __construct()
    {
    }

    public static function clean()
    {
        self::$instance = null;
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function get($key)
    {
        $path = $this->freezedir . DIRECTORY_SEPARATOR . $key;
        if (file_exists($path)) {
            clearstatcache();
            $mtime = filemtime($path);
            if (! isset($this->mtimes[$key])) {
                $this->mtimes[$key] = 0;
            }
            if ($mtime > $this->mtimes[$key]) {
                $data = file_get_contents($path);
                $this->mtimes[$key] = $mtime;
                return ($this->values[$key] = unserialize($data));
            }
        }
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    protected function set($key, $val)
    {
        $this->values[$key] = $val;
        $path = $this->freezedir . DIRECTORY_SEPARATOR . $key;
        file_put_contents($path, serialize($val));
        $this->mtimes[$key] = time();
    }

    public static function getDSN()
    {
        return self::instance()->get('dsn');
    }

    public static function setDSN($dsn)
    {
        return self::instance()->set('dsn', $dsn);
    }

    public static function setControllerMap(ControllerMap $map)
    {
        self::instance()->set('cmap', $map);
    }

    public static function getControllerMap()
    {
        return self::instance()->get('cmap');
    }

    public static function appController()
    {
        $obj = self::instance();
        if (! isset($obj->appController)) {
            $cmap = $obj->getControllerMap();
            $obj->appController = new AppController($cmap);
        }
        return $obj->appController;
    }

    public static function getRequest()
    {
        $inst = self::instance();
        if (is_null($inst->request)) {
            $inst->request = new Request();
        }
        return $inst->request;
    }
}
