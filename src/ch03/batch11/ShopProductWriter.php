<?php

namespace popp\ch03\batch11;

/* listing 03.56 */
class ShopProductWriter
{
    public function write($shopProduct): void
    {
        if (
            ! ($shopProduct instanceof CdProduct) &&
            ! ($shopProduct instanceof BookProduct)
        ) {
            die("wrong type supplied");
        }
        $str  = "{$shopProduct->title}: "
             . $shopProduct->getProducer()
             . " ({$shopProduct->price})\n";
        print $str;
    }
}
/* /listing 03.56 */
