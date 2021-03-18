<?php

declare(strict_types=1);

namespace \popp\ch18\batch04\base;

class MemApplicationRegistry extends Registry
{
    private static $instance = null;
    private $values = array();
    private $id;

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
        return \apc_fetch($key);
    }

    protected function set($key, $val)
    {
        return \apc_store($key, $val);
    }

    public static function getDSN()
    {
        return self::instance()->get("dsn");
    }

    public static function setDSN($dsn)
    {
        return self::instance()->set("dsn", $dsn);
    }
}
