<?php

declare(strict_types=1);

namespace \popp\ch18\batch04\base;

class RequestRegistry extends Registry
{
    private $values = [];
    private static $instance = null;

    private function __construct()
    {
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
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    protected function set($key, $val)
    {
        $this->values[$key] = $val;
    }

    public static function getRequest()
    {
        $inst = self::instance();
        if (is_null($inst->get("request"))) {
            $inst->set('request', new \woo\controller\Request());
        }
        return $inst->get("request");
    }
}
