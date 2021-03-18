<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class SpaceMapper extends Mapper
{
    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;
    private \PDOStatement $findByVenueStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE id=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE space SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT into space ( name, venue ) VALUES( ?, ?)"
        );

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM space"
        );

        $this->findByVenueStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
    }

    protected function getCollection(array $raw): SpaceCollection
    {
        return new SpaceCollection($raw, $this);
    }

/* listing 13.29 */

    // SpaceMapper

    protected function doCreateObject(array $raw): Space
    {

        $obj = new Space((int)$raw['id'], $raw['name']);
        $venmapper = new VenueMapper();
        $venue = $venmapper->find((int)$raw['venue']);
        $obj->setVenue($venue);

        $eventmapper = new EventMapper();
        $eventcollection = $eventmapper->findBySpaceId((int)$raw['id']);
        $obj->setEvents($eventcollection);

        return $obj;
    }
/* /listing 13.29 */

    // SpaceMapper

    protected function targetClass(): string
    {
        return Space::class;
    }

    protected function doInsert(DomainObject $object): void
    {
        $venue = $object->getVenue();

        if (! $venue) {
            throw new AppException("cannot save without venue");
        }

        $values = [ $object->getname(), $venue->getId() ];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function update(DomainObject $object): void
    {
        $values = [$object->getname(), $object->getid(), $object->getId()];
        $this->updateStmt->execute($values);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }

    public function findByVenue($vid): SpaceCollection
    {
        $this->findByVenueStmt->execute([$vid]);

        return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
    }
}
