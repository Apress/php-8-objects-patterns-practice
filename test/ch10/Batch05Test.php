<?php

namespace popp\ch10\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;


class Batch05Test extends BaseUnit
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

    public function testTroopCarrier()
    {
        $carrier = new TroopCarrier();
        $carrier->addUnit(new Archer());
        $carrier->addUnit(new Tank());
        try {
            $carrier->addUnit(new Cavalry());
            self::fail("should have thrown exception");
        } catch (\Exception $e) {
            self::assertEquals($e->getMessage(), "Can't get a horse on the vehicle");
        }
    }
}
