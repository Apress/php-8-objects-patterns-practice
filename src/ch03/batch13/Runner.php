<?php

namespace popp\ch03\batch13;

use popp\ch03\batch13\ShopProduct;
use popp\ch03\batch13\CdProduct;
use popp\ch03\batch13\BookProduct;
use popp\ch03\batch09\AddressManager;

class Runner
{

    public static function run1()
    {
        $product2 =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            0,
            60.33
        );
        print "artist: {$product2->getProducer()}\n";
    }
}
