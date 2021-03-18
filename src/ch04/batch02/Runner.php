<?php

declare(strict_types=1);

namespace popp\ch04\batch02;

class Runner
{
    public static function run()
    {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(2, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(3, $pdo);
        print_r($obj);
    }

// listing 04.03
    public static function run2()
    {
/* listing 04.06 */
        $dsn = "sqlite:/tmp/products.sqlite3";
        $pdo = new \PDO($dsn, null, null);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $obj = ShopProduct::getInstance(1, $pdo);
/* /listing 04.06 */
        print $obj->getProducerFirstName();
    }

    public static function run3()
    {
/* listing 04.08 */
        print ShopProduct::AVAILABLE;
/* /listing 04.08 */
    }
}
