<?php
declare(strict_types=1);

namespace popp\ch09\batch14_1;

use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch11\TerrainFactory;


require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch14_1Test extends BaseUnit
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertEquals($val, "Appointment data encoded in BloggsCal format\n");
    }

    public function testRunnerNotInConf()
    {
        $val = $this->capture(function() { Runner::run2(); });
        //print $val;
        self::assertEquals($val, "Appointment data encoded in MegaCal format\n");
    }
}
