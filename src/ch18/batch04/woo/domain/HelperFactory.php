<?php

namespace popp\ch18\batch04\woo\domain;

use popp\ch18\batch04\woo\base\AppException;

class HelperFactory
{
    private static $package = "\\popp\\ch18\\batch04\\woo\\mapper";

    public static function getFinder($type)
    {
        $type = preg_replace('|^.*\\\|', "", $type);
        $mapper = self::$package . "\\{$type}Mapper";
        if (class_exists($mapper)) {
            return new $mapper();
        }
        throw new AppException("Unknown: $mapper");
    }

    public static function getCollection($type)
    {
        $type = preg_replace('|^.*\\\|', "", $type);
        $collection = self::$package . "\\{$type}Collection";
        if (class_exists($collection)) {
            return new $collection();
        }
        throw new AppException("Unknown: $collection");
    }
}
