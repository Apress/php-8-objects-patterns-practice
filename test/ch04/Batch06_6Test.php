<?php
declare(strict_types=1);

namespace popp\ch04\batch06_6;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06_6Test extends BaseUnit 
{

    public function testRunner()
    {

        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("20\n", $val);
    }
}
