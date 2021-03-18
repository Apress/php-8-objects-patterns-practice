<?php

declare(strict_types=1);

namespace popp\ch13\batch02;

use popp\ch13\batch01\Venue;
use popp\ch13\batch01\Collection;
use popp\ch13\batch01\VenueCollection;
use popp\ch13\batch01\Mapper;
use popp\ch13\batch01\DomainObject;
use popp\ch13\batch01\SpaceMapper;

class VenueMapper extends Mapper
{
    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM venue WHERE id=?"
        );

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM venue"
        );

        $this->updateStmt = $this->pdo->prepare(
            "UPDATE venue SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO venue ( name ) VALUES( ? )"
        );
    }

    protected function targetClass(): string
    {
        return Venue::class;
    }

    public function getCollection(array $raw): VenueCollection
    {
        return new VenueCollection($raw, $this);
    }

/* listing 13.14 */

    // VenueMapper

    protected function doCreateObject(array $raw): Venue
    {
        $obj = new Venue(
            (int)$raw['id'],
            $raw['name']
        );

        $spacemapper = new SpaceMapper();
        $spacecollection = $spacemapper->findByVenue($raw['id']);
        $obj->setSpaces($spacecollection);

        return $obj;
    }
/* /listing 13.14 */

    protected function doInsert(DomainObject $object): void
    {
        $values = [$object->getName()];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    public function update(DomainObject $object): void
    {
        $values = [
            $object->getName(),
            $object->getId(),
            $object->getId()
        ];

        $this->updateStmt->execute($values);
    }

    public function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    public function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }
}
