<?php

namespace popp\ch03\batch01;

use popp\ch03\batch01\ShopProduct;

class Runner
{
    public static function run()
    {
/* listing 03.02 */
        $product1 = new ShopProduct();
        $product2 = new ShopProduct();
/* /listing 03.02 */

/* listing 03.03 */
        var_dump($product1);
        var_dump($product2);
/* /listing 03.03 */
    }
}
