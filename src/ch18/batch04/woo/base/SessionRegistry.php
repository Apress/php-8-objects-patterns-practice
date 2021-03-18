<?php

declare(strict_types=1);

namespace \popp\ch18\batch04\base;

class SessionRegistry extends Registry
{
    private static $instance = null;
    private function __construct()
    {
        session_start();
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
        if (isset($_SESSION[__CLASS__][$key])) {
            return $_SESSION[__CLASS__][$key];
        }
        return null;
    }

    protected function set($key, $val)
    {
        $_SESSION[__CLASS__][$key] = $val;
    }

    public function setDSN($dsn)
    {
        self::instance()->set('dsn', $dsn);
    }

    public function getDSN()
    {
        return self::instance()->get("dsn");
    }
}
