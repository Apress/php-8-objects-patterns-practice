<?php

namespace popp\ch03;

use popp\test\BaseUnit;

use popp\ch03\batch01\ShopProduct;
use popp\ch03\batch01\Runner;

class Batch01Test extends BaseUnit
{
    function testProduct()
    {
        // 03.01 - src/ch03/batch01/ShopProduct.php
        $blah = new ShopProduct();
        self::assertTrue($blah instanceof ShopProduct);

        // 03.03 - src/ch03/batch01/Runner.php
        $output = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("|object\\(popp\\\\ch03\\\\batch01\\\\ShopProduct\\)#|", $output);
    }
}
