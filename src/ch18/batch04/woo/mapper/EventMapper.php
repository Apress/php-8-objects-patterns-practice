<?php

namespace popp\ch18\batch04\woo\mapper;

use popp\ch18\batch04\woo\base\AppException;
use popp\ch18\batch04\woo\Domain;

class EventMapper extends Mapper implements \woo\domain\EventFinder
{

    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare(
            "SELECT * FROM event"
        );
        $this->selectBySpaceStmt = self::$PDO->prepare(
            "SELECT * FROM event where space=?"
        );
        $this->selectStmt = self::$PDO->prepare(
            "SELECT * FROM event WHERE id=?"
        );
        $this->updateStmt = self::$PDO->prepare(
            "UPDATE event SET start=?, duration=?, name=?, id=? WHERE id=?"
        );
        $this->insertStmt = self::$PDO->prepare(
            "INSERT into event (start, duration, space, name)
                             values( ?, ?, ?, ?)"
        );
    }

    public function getCollection(array $raw)
    {
        return new EventCollection($result->fetchAll(), $this);
    }

    public function findBySpaceId($s_id)
    {
        return new DeferredEventCollection(
            $this,
            $this->selectBySpaceStmt,
            [$s_id]
        );
    }

    protected function doCreateObject(array $array)
    {
        $obj = new \woo\domain\Event($array['id']);
        $obj->setstart($array['start']);
        $obj->setduration($array['duration']);
        $obj->setname($array['name']);
        $space_mapper = new SpaceMapper();
        $space = $space_mapper->find($array['space']);
        $obj->setSpace($space);

        return $obj;
    }

    protected function targetClass()
    {
        return "woo\\domain\\Event";
    }

    protected function doInsert(\woo\domain\DomainObject $object)
    {
        $space = $object->getSpace();

        if (! $space) {
            throw new AppException("cannot save without space");
        }

        $values = array( $object->getstart(), $object->getduration(), $space->getId(), $object->getname() );
        $this->insertStmt->execute($values);
    }

    public function update(\woo\domain\DomainObject $object)
    {
        $values = [$object->getstart(), $object->getduration(), $object->getname(), $object->getid(), $object->getId()];
        $this->updateStmt->execute($values);
    }

    public function selectStmt()
    {
        return $this->selectStmt;
    }

    public function selectAllStmt()
    {
        return $this->selectAllStmt;
    }
}
