<?php

declare(strict_types=1);

namespace popp\ch13\batch03;

use popp\ch13\batch01\Collection;
use popp\ch13\batch01\DomainObject;
use popp\ch13\batch01\Registry;

abstract class Mapper
{
    protected \PDO $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPdo();
    }

/* listing 13.22 */

    // Mapper

    public function find(int $id): ?DomainObject
    {
        $old = $this->getFromMap($id);

        if (! is_null($old)) {
            return $old;
        }

        // work with db
/* /listing 13.22 */
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

/* listing 13.22 */
        return $object;
    }

    abstract protected function targetClass(): string;

    private function getFromMap($id): ?DomainObject
    {
        return ObjectWatcher::exists(
            $this->targetClass(),
            $id
        );
    }

    private function addToMap(DomainObject $obj): void
    {
        ObjectWatcher::add($obj);
    }

    public function createObject($raw): ?DomainObject
    {
        $old = $this->getFromMap((int)$raw['id']);

        if (! is_null($old)) {
            return $old;
        }

        $obj = $this->doCreateObject($raw);
        $this->addToMap($obj);

        return $obj;
    }

    public function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
        $this->addToMap($obj);
    }

/* /listing 13.22 */
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
