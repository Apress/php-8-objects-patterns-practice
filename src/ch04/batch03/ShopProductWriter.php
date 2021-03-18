<?php

declare(strict_types=1);

namespace popp\ch04\batch03;

use popp\ch04\batch02\ShopProduct;

/* listing 04.11 */
/* listing 04.09 */
abstract class ShopProductWriter
{
    protected array $products = [];

    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }
/* /listing 04.09 */

    abstract public function write(): void;
/* listing 04.09 */
}
