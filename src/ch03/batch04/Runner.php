<?php

namespace popp\ch03\batch04;

use popp\ch03\batch04\ShopProduct;

class Runner
{
    public static function run1()
    {
/* listing 03.16 */
        $product1 = new ShopProduct(
            "My Antonia",
            "Willa",
            "Cather",
            5.99
        );
        print "author: {$product1->getProducer()}\n";
/* /listing 03.16 */
    }
}
