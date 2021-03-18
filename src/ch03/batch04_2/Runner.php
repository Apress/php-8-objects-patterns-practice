<?php

namespace popp\ch03\batch04_2;

use popp\ch03\batch04_2\ShopProduct;

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

    public static function run2()
    {
/* listing 03.18 */
        $product1 = new ShopProduct("Shop Catalogue", "", "", 0);
/* /listing 03.18 */
        print "author: {$product1->getProducer()}\n";
    }

    public static function run3()
    {
/* listing 03.20 */
        $product1 = new ShopProduct("Shop Catalogue");
/* /listing 03.20 */
        print "author: {$product1->getProducer()}\n";
    }

    public static function run4()
    {
/* listing 03.21 */
        $product1 = new ShopProduct(
            price: 0.7,
            title: "Shop Catalogue"
        );
/* /listing 03.21 */
        print "title: {$product1->title}\n";
        print "price: {$product1->price}\n";
    }
}
