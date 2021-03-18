<?php

namespace popp\ch03\batch14;

use popp\ch03\batch14\ShopProduct;

/* listing 03.69 */
class ShopProductWriter
{
    public $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    public function write(): void
    {
        $str =  "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}
/* /listing 03.69 */
