<?php
declare(strict_types=1);

namespace popp\ch09\batch11;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch11Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $testout = <<<OUT
popp\\ch09\\batch11\\EarthSea Object
(
)
popp\\ch09\\batch11\\EarthPlains Object
(
)
popp\\ch09\\batch11\\EarthForest Object
(
)

OUT;
        self::assertEquals($val, $testout);
        
    }

    public function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });
        $testout = <<<OUT
popp\\ch09\\batch11\\EarthSea Object
(
)
popp\\ch09\\batch11\\MarsPlains Object
(
)
popp\\ch09\\batch11\\EarthForest Object
(
)

OUT;
        self::assertEquals($val, $testout);
        
    }
}
