<?php

namespace popp\ch18\batch04\woo\controller;

use popp\ch18\batch04\woo\command\Command;

class Request
{
    private $appreg;
    private $properties;
    private $objects = array();
    private $feedback = array();
    private $lastCommand;

    public function __construct()
    {
        $this->init();
    }

/* listing 18.24 */
    public function init()
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            if ($_SERVER['REQUEST_METHOD']) {
                $this->properties = $_REQUEST;
                return;
            }
        }

        foreach ($_SERVER['argv'] as $arg) {
            if (strpos($arg, '=')) {
                list($key, $val) = explode("=", $arg);
                $this->setProperty($key, $val);
            }
        }
    }
/* /listing 18.24 */

    public function getProperty($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty($key, $val)
    {
        $this->properties[$key] = $val;
    }

    public function __clone()
    {
        $this->properties = array();
    }

    public function addFeedback($msg)
    {
        array_push($this->feedback, $msg);
    }

    public function getFeedback()
    {
        return $this->feedback;
    }

    public function getFeedbackString($separator = "\n")
    {
        return implode($separator, $this->feedback);
    }

    public function setObject($name, $object)
    {
        $this->objects[$name] = $object;
    }

    public function getObject($name)
    {
        if (isset($this->objects[$name])) {
            return $this->objects[$name];
        }

        return null;
    }

    public function clearLastCommand()
    {
        $this->lastCommand = null;
    }

    public function setCommand(Command $command)
    {
        $this->lastCommand = $command;
    }

    public function getLastCommand()
    {
        return $this->lastCommand;
    }
}
