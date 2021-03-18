<?php

namespace popp\ch18\batch04\woo\mapper;

use popp\ch18\batch04\woo\base\AppException;
use popp\ch18\batch04\woo\Domain;

class SpaceMapper extends Mapper implements \woo\domain\SpaceFinder
{
    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare(
            "SELECT * FROM space"
        );
        $this->selectStmt = self::$PDO->prepare(
            "SELECT * FROM space WHERE id=?"
        );
        $this->updateStmt = self::$PDO->prepare(
            "UPDATE space SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = self::$PDO->prepare(
            "INSERT into space ( name, venue )
                             values( ?, ?)"
        );
        $this->findByVenueStmt = self::$PDO->prepare(
            "SELECT * FROM space where venue=?"
        );
    }

    public function getCollection(array $raw)
    {
        return new SpaceCollection($raw, $this);
    }

    protected function doCreateObject(array $array)
    {
        $obj = new \woo\domain\Space($array['id']);
        $obj->setname($array['name']);
        $ven_mapper = new VenueMapper();
        $venue = $ven_mapper->find($array['venue']);
        $obj->setVenue($venue);

        $event_mapper = new EventMapper();
        $event_collection = $event_mapper->findBySpaceId($array['id']);
        $obj->setEvents($event_collection);

        return $obj;
    }

    protected function targetClass()
    {
        return "woo\\domain\\Space";
    }

    protected function doInsert(\woo\domain\DomainObject $object)
    {
        $venue = $object->getVenue();

        if (! $venue) {
            throw new AppException("cannot save without venue");
        }

        $values = array( $object->getname(), $venue->getId() );
        $this->insertStmt->execute($values);
        $id = self::$PDO->lastInsertId();
        $object->setId($id);
    }

    public function update(\woo\domain\DomainObject $object)
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

    # custom
    public function findByVenue($vid)
    {
        $this->findByVenueStmt->execute(array( $vid ));

        return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
    }
    # end_custom
}
