<?php

/* listing 03.38 */
declare(strict_types=1);

/* /listing 03.38 */

namespace popp\ch03\batch10;

use popp\ch03\batch09\AddressManager;
use popp\ch03\batch09\ShopProduct;

class Runner
{

    public static function run1()
    {
        $manager = new AddressManager();
/* listing 03.38 */
        $manager->outputAddresses("false");
/* /listing 03.38 */
    }

    public static function run2()
    {
/* listing 03.51 */

        $product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
        $product2 = new ShopProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99
        );
        print "author: " . $product1->getProducer() . "\n";
        print "artist: " . $product2->getProducer() . "\n";
/* /listing 03.51 */
    }
}
