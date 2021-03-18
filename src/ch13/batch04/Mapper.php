<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

abstract class Mapper
{
    protected \PDO $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPdo();
    }

    public function find(int $id): DomainObject
    {
        $old = $this->getFromMap($id);

        if (! is_null($old)) {
            return $old;
        }

        $this->selectstmt()->execute([$id]);
        $raw = $this->selectstmt()->fetch();
        $this->selectstmt()->closeCursor();

        if (! is_array($raw)) {
            return null;
        }

        if (! isset($raw['id'])) {
            return null;
        }

        $object = $this->createObject($raw);

        return $object;
    }

    private function getFromMap($id): ?DomainObject
    {
        return ObjectWatcher::exists(
            $this->targetClass(),
            $id
        );
    }

    private function addToMap(DomainObject $obj): DomainObject
    {
        return ObjectWatcher::add($obj);
    }

/* listing 13.26 */

    // Mapper

    public function createObject($raw): DomainObject
    {
        $old = $this->getFromMap($raw['id']);

        if (! is_null($old)) {
            return $old;
        }

        $obj = $this->doCreateObject($raw);
        $this->addToMap($obj);

        return $obj;
    }
/* /listing 13.26 */

    public function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
        $this->addToMap($obj);
    }

    public function findAll(): Collection
    {
        $this->selectAllStmt()->execute([]);
        return $this->getCollection(
            $this->selectAllStmt()->fetchAll()
        );
    }


    abstract protected function selectAllStmt(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
    abstract protected function update(DomainObject $object): void;
    abstract protected function doCreateObject(array $raw): DomainObject;
    abstract protected function doInsert(DomainObject $object): void;
    abstract protected function selectStmt(): \PDOStatement;
}
