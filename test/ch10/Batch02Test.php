<?php

namespace popp\ch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch10\batch02\Archer;
use popp\ch10\batch02\LaserCannonUnit;
use popp\ch10\batch02\Runner;

class Batch02Test extends BaseUnit 
{
    public function testBombard()
    {
        $archer = new Archer();
        self::assertEquals($archer->bombardStrength(), 4);

        $cannon = new LaserCannonUnit();
        self::assertEquals($cannon->bombardStrength(), 44);
    }
}

