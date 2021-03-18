<?php
declare(strict_types=1);

namespace popp\ch04\batch21;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch21Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals(210, $val);
        
    }

    public function testRunnerShallow()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals(200, $val);
        
    }

}
