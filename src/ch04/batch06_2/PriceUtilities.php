<?php

declare(strict_types=1);

namespace popp\ch04\batch06_2;

trait PriceUtilities
{
    private int $taxrate = 20;

    public function calculateTax(float $price): float
    {
        return ( ( $this->taxrate / 100 ) * $price );
    }

    // other utilities
}
