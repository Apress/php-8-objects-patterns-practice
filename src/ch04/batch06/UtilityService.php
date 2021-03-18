<?php

declare(strict_types=1);

namespace popp\ch04\batch06;

/* listing 04.24 */

class UtilityService extends Service
{
    private int $taxrate = 20;

    public function calculateTax(float $price): float
    {
        return ( ( $this->taxrate / 100 ) * $price );
    }
}
