<?php

declare(strict_types=1);

namespace popp\ch03\batch14;

/* listing 03.44 */

class Storage
{
    public function add(string $key, string|bool|null $value)
    {
        // do something with $key and $value
/* /listing 03.44 */
        return [$key, $value];
/* listing 03.44 */
    }

/* /listing 03.44 */
/* listing 03.45 */
    public function setShopProduct(ShopProduct|null $product)
    {
        // do something with $product
/* /listing 03.45 */
        return $product;
/* listing 03.45 */
    }
/* /listing 03.45 */

/* listing 03.46 */
    public function setShopProduct2(ShopProduct|false $product)
    {
        // do something with $product
/* /listing 03.46 */
        return $product;
/* listing 03.46 */
    }


/* listing 03.44 */
}
/* /listing 03.44 */
