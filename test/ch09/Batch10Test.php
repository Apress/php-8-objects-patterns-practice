<?php
declare(strict_types=1);

namespace popp\ch09\batch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch10Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        $testout = <<<OUT
BloggsCal header
Appointment data encoded in BloggsCal format
BloggsCal footer

OUT;

        self::assertEquals($val, $testout);
    }
}
