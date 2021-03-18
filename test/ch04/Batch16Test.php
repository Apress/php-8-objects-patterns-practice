<?php
declare(strict_types=1);

namespace popp\ch04\batch16;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch16Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
$expected = <<<EXPECTED
street address: 441b Bakers Street
street address: 15 Albert Mews
street address: 34 West 24th Avenue

EXPECTED;
        self::assertEquals($expected, $val);
        
    }

    public function testRunnerShorter()
    {
        $val = $this->capture(function() { Runner::run2(); });
$expected = <<<EXPECTED
popp\ch04\batch16\Address Object
(
    [number:popp\ch04\batch16\Address:private] => 441b
    [street:popp\ch04\batch16\Address:private] => Bakers Street
)

EXPECTED;
        self::assertEquals($expected, $val);
    }
}
