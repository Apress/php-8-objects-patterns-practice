<?php

declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.16 */
class ShopProduct implements Chargeable
{
    // ...
    protected float $price;
    // ...
/* /listing 04.16 */
    public function __construct(float $price)
    {
        $this->price = $price;
    }
/* listing 04.16 */

    public function getPrice(): float
    {
        return $this->price;
    }
    // ...
}
