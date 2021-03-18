<?php
declare(strict_types=1);

namespace popp\ch04\batch06;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit 
{
    public function testRunner()
    {
        $this->expectException(\Error::class);
        Document::create();
    }

    function testCalculateTax() {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("20\n", $val);
    }


}
