<?php
declare(strict_types=1);

namespace popp\ch04\batch15;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch15Test extends BaseUnit 
{

    public function testRunnerJustBob()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Bob", $val);
        
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("Bob", $val);
        
    }

}
