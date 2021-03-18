<?php
declare(strict_types=1);

namespace popp\ch04\batch06_9;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06_9Test extends BaseUnit 
{
    public function testBreachPrivacy()
    {
        self::expectException(\Error::class);
        Runner::run();
    }

    public function testFinalPrice()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("120\n", $val);
    }

}

