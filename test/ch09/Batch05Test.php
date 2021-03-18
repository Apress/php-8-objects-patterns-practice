<?php
declare(strict_types=1);

namespace popp\ch09\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $testout = <<<OUT
** real DSN
** test DSN

OUT;
        self::assertEquals($val, $testout);
//        print $val;
        
    }
}
