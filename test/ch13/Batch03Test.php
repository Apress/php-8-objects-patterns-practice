<?php
declare(strict_types=1);

namespace popp\ch13\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
The Likey Lounge
The Something Else
The Bibble Beer Likey Lounge

EXPECTED;
        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("The Likey Lounge\n", $val);
        
    }

}
