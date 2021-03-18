<?php
declare(strict_types=1);

namespace popp\ch09\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals($val, "mary: I'll clear my desk\n");
        //print $val;
        
    }
}
