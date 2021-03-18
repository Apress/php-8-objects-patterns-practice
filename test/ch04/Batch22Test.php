<?php
declare(strict_types=1);

namespace popp\ch04\batch22;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch22Test extends BaseUnit 
{

    public function testRunner()
    {
        $this->expectException(\Error::class);
        Runner::run();
    }

    public function testRunnerPerson()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("Bob (age 44)", $val);
    }

    public function testRunnerStringablePerson()
    {
        $val = $this->capture(function() { Runner::run3(); });
        self::assertEquals("Bob (age 44)", $val);
    }
}
