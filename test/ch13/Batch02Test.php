<?php
declare(strict_types=1);

namespace popp\ch13\batch02;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch02Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $exp = <<<EXP
The Likey Lounge
    Stage Upstairs
    The Basement

EXP;
        self::assertEquals($exp, $val);

        $val = $this->capture(function() { Runner::run2(); });
        $exp = <<<EXP
bob
The Likey Lounge
The Hatey Lounge

EXP;
        self::assertEquals($exp, $val);

        $val = $this->capture(function() { Runner::run3(); });
        $exp = <<<EXP
The Likey Lounge
    Stage Upstairs
    The Basement

EXP;
        self::assertEquals($exp, $val);
    }
}
