<?php

namespace popp\ch03\batch09;

use popp\ch03\batch09\ShopProduct;
use popp\ch03\batch09\AddressManager;

class Runner
{

    public static function run1()
    {
/* listing 03.34 */
        // will fail
        $product = new ShopProduct("title", "first", "main", []);
/* /listing 03.34 */
    }

    public static function run2()
    {
/* listing 03.35 */
        $product = new ShopProduct("title", "first", "main", "4.22");
/* /listing 03.35 */
        print $product->getPrice();
    }


    public static function run3()
    {
        $manager = new AddressManager();
/* listing 03.37 */
        $manager->outputAddresses("false");
/* /listing 03.37 */
    }
}
