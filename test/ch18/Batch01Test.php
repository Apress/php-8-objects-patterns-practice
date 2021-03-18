<?php
declare(strict_types=1);

namespace popp\ch18\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression("/\[pass\] => 12345/", $val);
        self::assertMatchesRegularExpression("/\[mail\] => bob@example.com/", $val);
        self::assertMatchesRegularExpression("/\[name\] => bob williams/", $val);
        self::assertMatchesRegularExpression("/\[failed\] => \d+/", $val);
    
    
    
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/pass, friend!/", $val);
    }
}
