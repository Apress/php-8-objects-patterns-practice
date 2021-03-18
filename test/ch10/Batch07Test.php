<?php

namespace popp\ch10\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit
{
    public function testRunner()
    {
        $val = $this->capture(function () {
            Runner::run();
        });
        self::assertMatchesRegularExpression("/authenticating request/", $val);
        self::assertMatchesRegularExpression("/structuring request data/", $val);
        self::assertMatchesRegularExpression("/logging request/", $val);
        self::assertMatchesRegularExpression("/doing something useful with request/", $val);
    }
}
