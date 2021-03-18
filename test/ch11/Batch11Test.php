<?php
declare(strict_types=1);

namespace popp\ch11\batch11;
use popp\ch11\batch08\Army;
//use popp\ch11\batch08\TaxCollectionVisitor;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch11Test extends BaseUnit 
{

    public function testRunner()
    {
        $acquirer = new UnitAcquisition(); 
        $tileforces = new TileForces(4, 2, $acquirer);
        $power = $tileforces->firepower();
        $health = $tileforces->health();

        self::assertEquals(50, $power);
        self::assertEquals(30, $health);

    }
}
