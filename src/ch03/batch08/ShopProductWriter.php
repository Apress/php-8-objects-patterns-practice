<?php

namespace popp\ch03\batch08;

use popp\ch03\batch04\ShopProduct;

class ShopProductWriter
{
/* listing 03.30 */
    public function write(ShopProduct $shopProduct)
    {
        // ...
/* /listing 03.30 */
        $str  = "{$shopProduct->title}: " .
                $shopProduct->getProducer() .
                " ({$shopProduct->price})\n";
        print $str;
/* listing 03.30 */
    }
/* /listing 03.30 */
}
