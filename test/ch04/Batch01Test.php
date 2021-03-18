<?php
declare(strict_types=1);

namespace popp\ch04\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("0hello", $val);

        $val = $this->capture(function() { Runner::run2(); });
        $expected = "hello (1)\nhello (2)\nhello (3)\n";
        self::assertEquals($expected, $val);
    }
}
