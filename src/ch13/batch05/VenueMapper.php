<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class VenueMapper extends Mapper
{

    private \PDOStatement $selectStmt;
    private \PDOStatement $selectAllStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM venue"
        );
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM venue WHERE id=?"
        );
        $this->updateStmt = $this->pdo->prepare(
            "UPDATE venue SET name=?, id=? WHERE id=?"
        );
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO venue ( name )
                             VALUES( ? )"
        );
    }

    protected function targetClass(): string
    {
        return Venue::class;
    }

    protected function doInsert(DomainObject $object): void
    {
        $values = array( $object->getname() );
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $object->setId($id);
    }

    public function update(DomainObject $object): void
    {
        $values = array( $object->getname(), $object->getid(), $object->getId() );
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
