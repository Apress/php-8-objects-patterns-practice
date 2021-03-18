<?php
declare(strict_types=1);

namespace popp\ch09\batch13;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch13Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Appointment data encoded in MegaCal format\n", $val);
        //print $val;
        
    }
}
