<?php

namespace popp\ch10\batch08;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch08Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () {
            Runner::run();
        });
        self::assertMatchesRegularExpression("/gents hat/", $val);
        self::assertMatchesRegularExpression("/ladies jumper/", $val);
        self::assertMatchesRegularExpression("/Product Object/", $val);
        self::assertMatchesRegularExpression("/234/", $val);
        self::assertMatchesRegularExpression("/532/", $val);

        $val = $this->capture(function () {
            Runner::run2();
        });
        print $val;

    }
}
