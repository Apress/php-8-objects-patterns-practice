<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

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
            "INSERT INTO space ( name, venue ) VALUES( ?, ?)"
        );

/* listing 13.16 */

        // SpaceMapper::__construct()

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM space"
        );
        $this->findByVenueStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
/* /listing 13.16 */
    }

/* listing 13.17 */
    public function getCollection(array $raw): SpaceCollection
    {
        return new SpaceCollection($raw, $this);
    }
/* /listing 13.17 */

    protected function doCreateObject(array $raw): Space
    {
        $obj = new Space(
            (int)$raw['id'],
            $raw['name']
        );

        $venmapper = new VenueMapper();
        $venue = $venmapper->find((int)$raw['venue']);
        $obj->setVenue($venue);

        //$eventmapper = new EventMapper();
        //$eventcollection = $eventmapper->findBySpaceId($raw['id']);
        //$obj->setEvents($eventcollection);
        return $obj;
    }

/* listing 13.23 */

    // SpaceMapper

    protected function targetClass(): string
    {
        return Space::class;
    }
/* /listing 13.23 */

    protected function doInsert(DomainObject $obj): void
    {
        $venue = $obj->getVenue();

        if (! $venue) {
            throw new AppException("cannot save without venue");
        }

        $values = [ $obj->getname(), $venue->getId() ];
        $this->insertStmt->execute($values);
        $id = $this->pdo->lastInsertId();
        $obj->setId((int)$id);
    }

    public function update(DomainObject $obj): void
    {
        $values = [
            $obj->getname(),
            $obj->getid(),
            $obj->getId()
        ];

        $this->updateStmt->execute($values);
    }

    protected function selectStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

    protected function selectAllStmt(): \PDOStatement
    {
        return $this->selectStmt;
    }

/* listing 13.18 */
    public function findByVenue($vid): SpaceCollection
    {
        $this->findByVenueStmt->execute([$vid]);

        return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
    }
/* /listing 13.18 */
}
