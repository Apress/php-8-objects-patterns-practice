<?php
declare(strict_types=1);

namespace popp\ch04\batch12;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch12Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = Runner::run();
        self::assertEquals("xml exception", $val); 
    }
}
