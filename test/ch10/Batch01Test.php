<?php

namespace popp\ch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch10\batch01\Archer;
use popp\ch10\batch01\LaserCannonUnit;
use popp\ch10\batch01\Runner;

class Batch01Test extends BaseUnit 
{
    public function testProduct()
    {
        $archer = new Archer();
        self::assertEquals($archer->bombardStrength(), 4);

        $cannon = new LaserCannonUnit();
        self::assertEquals($cannon->bombardStrength(), 44);
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals($val, 48);
        
    }
}

