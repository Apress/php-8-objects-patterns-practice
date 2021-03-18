<?php

namespace popp\ch11\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testEval()
    {
        $val = $this->capture(function() { Runner::run4(); });
        self::assertMatchesRegularExpression("/nobody/", $val);
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals($val, "four\n");

        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals($val, "four\nfour\nfive\nfive\n");

        $val = $this->capture(function() { Runner::run3(); });
        $expected= <<<OUT
four:
top marks

4:
top marks

52:
dunce hat on


OUT;
        self::assertEquals($val, $expected);

    }
}

