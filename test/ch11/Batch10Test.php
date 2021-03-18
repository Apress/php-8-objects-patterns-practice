<?php
declare(strict_types=1);

namespace popp\ch11\batch10;
use popp\ch11\batch08\Army;
//use popp\ch11\batch08\TaxCollectionVisitor;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch10Test extends BaseUnit 
{

    public function testTileForces()
    {

        $acquirer = new UnitAcquisition(); 
        $tileforces = new TileForces(4, 2, $acquirer);
        $this->expectException(\Error::class);
        $power = $tileforces->firepower();
        $health = $tileforces->health();

        self::assertEquals(50, $power);
        self::assertEquals(30, $health);

    }


    public function testRunner()
    {
        $this->expectException(\Error::class);
        Runner::run();
    }

}
