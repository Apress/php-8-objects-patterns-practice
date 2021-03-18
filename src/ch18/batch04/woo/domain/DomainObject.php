<?php

namespace popp\ch18\batch04\woo\domain;

abstract class DomainObject
{
    private $id = -1;

    public function __construct($id = null)
    {
        if (is_null($id)) {
            $this->markNew();
        } else {
            $this->id = $id;
        }
    }

    public function markNew()
    {
        ObjectWatcher::addNew($this);
    }

    public function markDeleted()
    {
        ObjectWatcher::addDelete($this);
    }

    public function markDirty()
    {
        ObjectWatcher::addDirty($this);
    }

    public function markClean()
    {
        ObjectWatcher::addClean($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getCollection($type)
    {
        return HelperFactory::getCollection($type);
    }

    public function collection()
    {
        return self::getCollection(get_class($this));
    }

    public function finder()
    {
        return self::getFinder(get_class($this));
    }

    public static function getFinder($type)
    {
        return HelperFactory::getFinder($type);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function __clone()
    {
        $this->id = -1;
    }
}
