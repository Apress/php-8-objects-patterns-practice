<?php

namespace popp\ch18\batch04\woo\mapper;

use popp\ch18\batch04\woo\domain\Finders;
use popp\ch18\batch04\woo\mapper\Collections;
use popp\ch18\batch04\woo\Domain;
use popp\ch18\batch04\woo\domain\VenueFinder;
use popp\ch18\batch04\woo\domain\Venue;
use popp\ch18\batch04\woo\domain\DomainObject;

class VenueMapper extends Mapper implements VenueFinder
{
    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare(
            "SELECT * FROM venue"
        );
        $this->selectStmt = self::$PDO->prepare(
            "SELECT * FROM venue WHERE id=?"
        );
        $this->updateStmt = self::$PDO->prepare(
            "UPDATE venue SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = self::$PDO->prepare(
            "INSERT into venue ( name )
                             values( ? )"
        );
    }

    public function getCollection(array $raw)
    {
        return new SpaceCollection($raw, $this);
    }

    protected function doCreateObject(array $array)
    {
        $obj = new Venue($array['id']);
        $obj->setname($array['name']);
        //$space_mapper = new SpaceMapper();
        //$space_collection = $space_mapper->findByVenue( $array['id'] );
        //$obj->setSpaces( $space_collection );
        return $obj;
    }

    protected function targetClass()
    {
        return "popp\\ch18\\woo\\domain\\Venue";
    }

    protected function doInsert(DomainObject $object)
    {
        $values = array( $object->getname() );
        $this->insertStmt->execute($values);
        $id = self::$PDO->lastInsertId();
        $object->setId($id);
    }

    public function update(DomainObject $object)
    {
        $values = array( $object->getname(), $object->getid(), $object->getId() );
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
