<?php

declare(strict_types=1);

namespace popp\ch12\batch10;

class TableCreator extends Base
{

    public function createTables(): void
    {
        $pdo = $this->getPdo();
        $autoincrement = "AUTOINCREMENT";

        $pdo->query("DROP TABLE IF EXISTS venue");

        $pdo->query("CREATE TABLE venue ( id INTEGER PRIMARY KEY
            $autoincrement, name TEXT )");

        $pdo->query("INSERT INTO venue ( name ) VALUES ('bob')");
        $pdo->query("DROP TABLE  IF EXISTS space");

        $pdo->query("CREATE TABLE space ( id INTEGER PRIMARY KEY
            $autoincrement, venue INTEGER, name TEXT )");

        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE event ( id INTEGER PRIMARY KEY
            $autoincrement, space INTEGER, start long, duration int, name text )");
    }
}
