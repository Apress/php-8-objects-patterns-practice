<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

/* listing 13.03 */
class VenueMapper extends Mapper
{
    private \PDOStatement $selectStmt;
/* /listing 13.03 */
    private \PDOStatement $selectAllStmt;
/* listing 13.03 */
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo->prepare(
            "SELECT * FROM venue WHERE id=?"
        );

/* /listing 13.03 */

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM venue"
        );

/* listing 13.03 */
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

    protected function doCreateObject(array $raw): Venue
    {
        $obj = new Venue(
            (int)$raw['id'],
            $raw['name']
        );

        return $obj;
    }

/* listing 13.06 */
    protected function doInsert(DomainObject $obj): void
    {
        $values = [$obj->getName()];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $obj->setId((int)$id);
    }
/* /listing 13.06 */

    public function update(DomainObject $obj): void
    {
        $values = [
            $obj->getName(),
            $obj->getId(),
            $obj->getId()
        ];

        $this->updateStmt->execute($values);
    }

    public function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

/* /listing 13.03 */
    public function selectAllStmt(): \PDOStatement
    {
        return $this->selectAllStmt;
    }
/* listing 13.03 */
}
