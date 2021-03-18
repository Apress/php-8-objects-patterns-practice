<?php

namespace popp\ch10\batch06;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () {
            Runner::run();

        });
        self::assertEquals($val, "-2");

        $val2 = $this->capture(function () {
            Runner::run2();
        });
        self::assertEquals($val2, "2");

        $val3 = $this->capture(function () {
            Runner::run3();
        });
        self::assertEquals($val3, "4");

        $val4 = $this->capture(function () {
            Runner::run4();
        });
        self::assertEquals($val4, "0");


    }
}

