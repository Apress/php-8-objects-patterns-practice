<?php
declare(strict_types=1);

namespace popp\ch09\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch04Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        $testout = "matt\n";
        self::assertEquals($val, $testout);
        
    }
}
