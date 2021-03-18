<?php

namespace popp\ch18\batch04\woo\mapper;

use popp\ch18\batch04\woo\base\ApplicationRegistry;
use popp\ch18\batch04\woo\base\AppException;
use popp\ch18\batch04\woo\domain\Finder;
use popp\ch18\batch04\woo\domain\DomainObject;
use popp\ch18\batch04\woo\domain\ObjectWatcher;

abstract class Mapper implements Finder
{
    protected static $PDO;

    public function __construct()
    {
        if (! isset(self::$PDO)) {
            $dsn = ApplicationRegistry::getDSN();

            if (is_null($dsn)) {
                throw new AppException("No DSN");
            }

            self::$PDO = new \PDO($dsn);
            self::$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
    }

    private function getFromMap($id)
    {
        return \woo\domain\ObjectWatcher::exists(
            $this->targetClass(),
            $id
        );
    }

    private function addToMap(DomainObject $obj)
    {
        return ObjectWatcher::add($obj);
    }

    public function find($id)
    {
        $old = $this->getFromMap($id);

        if ($old) {
            return $old;
        }

        $this->selectstmt()->execute(array( $id ));
        $array = $this->selectstmt()->fetch();
        $this->selectstmt()->closeCursor();

        if (! is_array($array)) {
            return null;
        }

        if (! isset($array['id'])) {
            return null;
        }

        $object = $this->createObject($array);
        $object->markClean();

        return $object;
    }

    public function findAll()
    {
        $this->selectAllStmt()->execute(array());
        return $this->getCollection($this->selectAllStmt()->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function createObject($array)
    {
        $old = $this->getFromMap($array['id']);

        if ($old) {
            return $old;
        }

        $obj = $this->doCreateObject($array);
        $this->addToMap($obj);
        //$obj->markClean();

        return $obj;
    }

    public function insert(DomainObject $obj)
    {
        $this->doInsert($obj);
        $this->addToMap($obj);
        $obj->markClean();
    }

//  abstract function update( \woo\domain\DomainObject $object );
    abstract protected function getCollection(array $raw);
    abstract protected function doCreateObject(array $array);
    abstract protected function doInsert(DomainObject $object);
    abstract protected function targetClass();
    abstract protected function selectStmt();
    abstract protected function selectAllStmt();
}
