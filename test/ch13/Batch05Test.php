<?php
declare(strict_types=1);

namespace popp\ch13\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/Venue Object/", $val);
        //print $val;
        
        $names = Runner::run2();
        $expected = [
            "The Venue",
            "The Other Venue",
        ];
        self:: assertEquals($expected, $names);
    }
}
