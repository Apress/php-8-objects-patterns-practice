<?php
declare(strict_types=1);

namespace popp\ch12\batch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch12\batch06\Registry;

class Batch10Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        
        $reg = Registry::instance();
        $dsn = $reg->getDsn();
        $pdo = new \PDO($dsn);
        $query = "SELECT * from venue where name='The Eyeball Inn'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = [];
        while($row = $stmt->fetch()) {
            $rows[] = $row;
        }
        self::assertEquals(1, count($rows));
    }
}
