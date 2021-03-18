<?php
declare(strict_types=1);

namespace popp\ch09\batch12;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch12Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        $testout = <<<OUT
popp\\ch09\\batch12\\EarthSea Object
(
    [navigability:popp\\ch09\\batch12\\Sea:private] => -1
)
popp\\ch09\\batch12\\EarthPlains Object
(
)
popp\\ch09\\batch12\\EarthForest Object
(
)

OUT;
        self::assertEquals($val, $testout);
        
    }
    public function testContained()
    {
        $container = new Container();
        $contained1 = $container->contained;
        $newcontainer = clone $container;
        $contained2 = $newcontainer->contained;
        self::assertTrue(! ($contained1 === $contained2));
    }
}
