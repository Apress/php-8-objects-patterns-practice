<?php

declare(strict_types=1);

namespace popp\ch04\batch06_9;

/* suspended_listing 04.42 */
trait PriceUtilities
{
    public function calculateTax(float $price): float
    {
        return (($this->getTaxRate() / 100) * $price);
    }
    abstract public function getTaxRate(): float;
    // other utilities
}
