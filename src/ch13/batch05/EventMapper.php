<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class EventMapper extends Mapper
{
    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;
    private \PDOStatement $selectBySpaceStmt;

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
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE event SET start=?, duration=?, name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO event (start, duration, space, name)
                             VALUES( ?, ?, ?, ?)"
        );
    }

    public function findBySpaceId(int $sid): DeferredEventCollection
    {
        return new DeferredEventCollection(
            $this->getFactory()->getDomainObjectFactory(),
            $this->selectBySpaceStmt,
            [$sid]
        );
    }

    protected function targetClass(): string
    {
        return Event::class;
    }

    protected function doInsert(DomainObject $object): void
    {
        $space = $object->getSpace();

        if (! $space) {
            throw new \AppException("cannot save without Space");
        }

        $values = [
            $object->getstart(),
            $object->getduration(),
            $space->getId(),
            $object->getname()
        ];

        $this->insertStmt->execute($values);
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

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }
}
