<?php

declare(strict_types=1);

namespace popp\ch04\batch14;

/* listing 04.79 */
class IllegalCheckout extends Checkout
{
    final public function totalize(): void
    {
        // change bill calculation
    }
}
