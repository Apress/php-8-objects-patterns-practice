<?php
declare(strict_types=1);

namespace popp\ch04\batch14;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch14Test extends BaseUnit 
{

    public function testRunner()
    {
        Runner::run();
        $checkout = new Checkout();
        $void = $checkout->totalize();
        self::assertTrue($checkout instanceof Checkout);
    }
}
