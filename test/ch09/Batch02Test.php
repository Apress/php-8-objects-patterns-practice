<?php
declare(strict_types=1);

namespace popp\ch09\batch02;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch02Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $testout = <<<OUT
mary: I'll clear my desk
bob: I'll call my lawyer
harry: I'll clear my desk

OUT;
        self::assertEquals($val, $testout);
        //print $val;
        
    }
}
