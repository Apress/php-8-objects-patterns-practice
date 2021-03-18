<?php

declare(strict_types=1);

namespace popp\ch04\batch02;

class DbGenerate
{
    public function getPDO(): \PDO
    {
        $create_products = <<<SQL
/* listing 04.04 */
        CREATE TABLE products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type TEXT,
            firstname TEXT,
            mainname TEXT,
            title TEXT,
            price float,
            numpages int,
            playlength int,
            discount int )
/* /listing 04.04 */
SQL;
        //$dsn = "sqlite:/".__DIR__."/products.db";
        $dsn = "sqlite:/tmp/products.sqlite3";
        $pdo = new \PDO($dsn, null, null);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("select count(*) from SQLITE_MASTER");
        $row = $stmt->fetch();
        $stmt->closeCursor();
        if ($row[0] > 0) {
            $pdo->query("DROP TABLE products");
        }
        $pdo->query($create_products);
        $pdo->query("INSERT INTO products ( type, firstname, mainname, title, price, numpages, playlength, discount )
                                    values ( 'book', 'willa', 'cather', 'my antonia', 4.22, 200, NULL, 0 )");
        $pdo->query("INSERT INTO products ( type, firstname, mainname, title, price, numpages, playlength, discount )
                                    values ( 'cd', 'the', 'clash', 'london calling', 4.22, 200, 60, 0 )");
        $pdo->query("INSERT INTO products ( type, firstname, mainname, title, price, numpages, playlength, discount )
                                    values ( 'shop', NULL, 'pears', 'soap', 4.22, NULL, NULL, 0 )");
        return $pdo;
    }
}
