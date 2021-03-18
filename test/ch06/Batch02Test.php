<?php

namespace popp\ch06\batch02;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;


class Batch02Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression("/key1/", $val);
        self::assertMatchesRegularExpression("/val1/", $val);

        self::assertMatchesRegularExpression("/key2/", $val);
        self::assertMatchesRegularExpression("/val2/", $val);

        self::assertMatchesRegularExpression("/key3/", $val);
        self::assertMatchesRegularExpression("/val3/", $val);
        

    }
}

