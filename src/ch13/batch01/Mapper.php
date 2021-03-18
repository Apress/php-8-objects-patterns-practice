<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

/* listing 13.01 */
abstract class Mapper
{
    protected \PDO $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPdo();
    }

    public function find(int $id): ?DomainObject
    {
        $this->selectstmt()->execute([$id]);
        $row = $this->selectstmt()->fetch();
        $this->selectstmt()->closeCursor();

        if (! is_array($row)) {
            return null;
        }

        if (! isset($row['id'])) {
            return null;
        }

        $object = $this->createObject($row);

        return $object;
    }

/* /listing 13.01 */
/* listing 13.15 */

    // Mapper

    public function findAll(): Collection
    {
        $this->selectAllStmt()->execute([]);

        return $this->getCollection(
            $this->selectAllStmt()->fetchAll()
        );
    }

    abstract protected function selectAllStmt(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
/* /listing 13.15 */
/* listing 13.01 */

    public function createObject(array $raw): DomainObject
    {
        $obj = $this->doCreateObject($raw);
        return $obj;
    }

    public function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
    }

    abstract public function update(DomainObject $obj): void;
    abstract protected function doCreateObject(array $raw): DomainObject;
    abstract protected function doInsert(DomainObject $object): void;
    abstract protected function selectStmt(): \PDOStatement;
    abstract protected function targetClass(): string;
}
