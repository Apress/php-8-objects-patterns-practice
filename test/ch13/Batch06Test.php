<?php
declare(strict_types=1);

namespace popp\ch13\batch06;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/^ WHERE name = 'A Fine Show' and start > \d+/", $val);
    }
}
