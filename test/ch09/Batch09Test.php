<?php
declare(strict_types=1);

namespace popp\ch09\batch09;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch09Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected =<<<EXPECTED
MegaCal header
Appointment data encoded in MegaCal format
MegaCal footer

EXPECTED;
        self::assertEquals($expected, $val);
        //print $val;
        
    }
}
