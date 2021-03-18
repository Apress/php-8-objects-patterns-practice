<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class EventMapper extends Mapper
{

    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;
    private \PDOStatement $findBySpaceStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM event"
        );

        $this->selectBySpaceStmt = $this->pdo->prepare(
            "SELECT * FROM event WHERE space=?"
        );

        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM event WHERE id=?"
        );

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM event"
        );

        $this->updateStmt = $this->pdo->prepare(
            "UPDATE event SET start=?, duration=?, name=?, id=? WHERE id=?"
        );

        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO event (start, duration, space, name)
                             VALUES( ?, ?, ?, ?)"
        );
    }

    protected function getCollection(array $raw): EventCollection
    {
        return new EventCollection($raw, $this);
    }

    protected function doCreateObject(array $raw): Event
    {
        /*
        $obj->setstart($raw['start']);
        $obj->setduration($raw['duration']);
        */

        $spacemapper = new SpaceMapper();
        $space = $spacemapper->find((int)$raw['space']);
        //$obj->setSpace($space);

        $obj = new Event((int)$raw['id'], $raw['name'], (int)$raw['start'], (int)$raw['duration'], $space);
        return $obj;
    }

    // EventMapper

    protected function targetClass(): string
    {
        return Event::class;
    }

    public function update(DomainObject $object): void
    {
        $values = [
            $object->getstart(),
            $object->getduration(),
            $object->getname(),
            $object->getid(),
            $object->getId()
        ];

        $this->updateStmt->execute($values);
    }

    protected function doInsert(DomainObject $object): void
    {
        $space = $object->getSpace();

        if (! $space) {
            throw new AppException("cannot save without space");
        }

        $values = [
            $object->getstart(),
            $object->getduration(),
            $space->getId(),
            $object->getname()
        ];

        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId((int)$id);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }

/* listing 13.32 */

    // EventMapper

    public function findBySpaceId(int $sid): DeferredEventCollection
    {
        return new DeferredEventCollection(
            $this,
            $this->selectBySpaceStmt,
            [$sid]
        );
    }
/* /listing 13.32 */
}
