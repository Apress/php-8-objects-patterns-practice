<?php

namespace popp\ch03\batch12;

use popp\ch03\batch12\ShopProduct;
use popp\ch03\batch12\CdProduct;
use popp\ch03\batch12\BookProduct;
use popp\ch03\batch09\AddressManager;

class Runner
{

    public static function run1()
    {
/* listing 03.60 */
        $product2 = new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            0,
            60.33
        );
        print "artist: {$product2->getProducer()}\n";
/* /listing 03.60 */
    }
}
