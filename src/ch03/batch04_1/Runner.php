<?php

namespace popp\ch03\batch04_1;

use popp\ch03\batch04_1\ShopProduct;

class Runner
{
    public static function run1()
    {
        $product1 = new ShopProduct(
            "My Antonia",
            "Willa",
            "Cather",
            5.99
        );
        print "author: {$product1->getProducer()}\n";
    }
}
