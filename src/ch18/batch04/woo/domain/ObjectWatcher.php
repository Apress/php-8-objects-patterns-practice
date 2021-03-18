<?php

namespace popp\ch18\batch04\woo\domain;

class ObjectWatcher
{
    private $all = [];
    private $dirty = [];
    private $new = [];
    private $delete = [];
    private static $instance;

    private function __construct()
    {
    }

    public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new ObjectWatcher();
        }

        return self::$instance;
    }

    public function globalKey(DomainObject $obj)
    {
        $key = get_class($obj) . "." . $obj->getId();
        return $key;
    }

    public static function add(DomainObject $obj)
    {
        $inst = self::instance();
        $inst->all[$inst->globalKey($obj)] = $obj;
    }

    public static function exists($classname, $id)
    {
        $inst = self::instance();
        $key = "$classname.$id";

        if (isset($inst->all[$key])) {
            return $inst->all[$key];
        }

        return null;
    }

    public static function addDelete(DomainObject $obj)
    {
        $self = self::instance();
        $self->delete[$self->globalKey($obj)] = $obj;
    }


    public static function addDirty(DomainObject $obj)
    {
        $inst = self::instance();

        if (! in_array($obj, $inst->new, true)) {
            $inst->dirty[$inst->globalKey($obj)] = $obj;
        }
    }

    public static function addNew(DomainObject $obj)
    {
        $inst = self::instance();
        // we don't yet have an id
        $inst->new[] = $obj;
    }

    public static function addClean(DomainObject $obj)
    {
        $self = self::instance();
        unset($self->delete[$self->globalKey($obj)]);
        unset($self->dirty[$self->globalKey($obj)]);

        $self->new = array_filter(
            $self->new,
            function ($a) use ($obj) {
                return !( $a === $obj );
            }
        );
    }

    public function performOperations()
    {
        foreach ($this->dirty as $key => $obj) {
            $obj->finder()->update($obj);
        }

        foreach ($this->new as $key => $obj) {
            $obj->finder()->insert($obj);
        }

        $this->dirty = array();
        $this->new = array();
    }
}
