<?php
declare(strict_types=1);

namespace popp\ch05\batch09;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch09Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::runClass(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\info

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunMethod1()
    {
        $val = $this->capture(function() { Runner::runMethod1(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\moreinfo

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunMethod2()
    {
        $val = $this->capture(function() { Runner::runMethod2(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\ApiInfo
  - The 3 digit company identifier
  - A five character department tag

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunMethod3()
    {
        $val = $this->capture(function() { Runner::runMethod3(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\ApiInfo
  - The 3 digit company identifier
  - A five character department tag

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunMethod4()
    {
        $val = $this->capture(function() { Runner::runMethod4(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\ApiInfo
  - The 3 digit company identifier
  - A five character department tag

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunMethod5()
    {
        $val = $this->capture(function() { Runner::runMethod5(); });
        $expected = <<<EXPECTED
popp\ch05\batch09\ApiInfo
  - The 3 digit company identifier
  - A five character department tag

EXPECTED;
        self::assertEquals($expected, $val);
    }

}
