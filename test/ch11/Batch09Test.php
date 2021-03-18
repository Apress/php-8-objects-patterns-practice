<?php
declare(strict_types=1);

namespace popp\ch11\batch09;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch09Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        
        $out = <<<OUT
OUT;
        self::assertEquals($out, $val);

        $val = $this->capture(function() { Runner::run2(); });

        $out = <<<OUT
sending bob@bob.com: my brain: all about my brain

OUT;
        self::assertEquals($out, $val);
    }
}
