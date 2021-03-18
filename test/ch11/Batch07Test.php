<?php
declare(strict_types=1);

namespace popp\ch11\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
$out = <<<OUT
popp\ch11\batch07\Army: bombard: 52
    popp\ch11\batch07\Archer: bombard: 4
    popp\ch11\batch07\LaserCanonUnit: bombard: 44
    popp\ch11\batch07\Army: bombard: 2
        popp\ch11\batch07\Cavalry: bombard: 2
    popp\ch11\batch07\Cavalry: bombard: 2

OUT;
    self::assertEquals($val, $out);
        
    }
}
