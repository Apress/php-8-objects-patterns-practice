<?php

namespace popp\ch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch10\batch03\Army;
use popp\ch10\batch03\Soldier;
use popp\ch10\batch03\Tank;
use popp\ch10\batch03\Runner;
use popp\ch10\batch03\Archer;

class Batch03Test extends BaseUnit
{
    public function testArmy()
    {
        $tank =  new Tank();
        $tank2 = new Tank();
        $soldier = new Soldier();

        $army = new Army();
        $army->addUnit($soldier);
        $army->addUnit($tank);
        $army->addUnit($tank2);

        self::assertEquals(count($army->getUnits()), 3);
        $army->removeUnit($tank2);
        self::assertEquals(count($army->getUnits()), 2);
    }

    public function testArcher()
    {
        $archer = new Archer();
        $tank =  new Tank();
        try {
            $archer->addUnit($tank);
            self::fail("Exception should have been thrown");
        } catch (\Exception $e) {
            self::assertEquals($e->getMessage(), "popp\\ch10\\batch03\\Archer is a leaf");
        }
    }
}
