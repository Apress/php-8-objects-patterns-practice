<?php

declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* listing 04.33 */
class ShopProduct implements IdentityObject
{
    use PriceUtilities;
    use IdentityTrait;
}
