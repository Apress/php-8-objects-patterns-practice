<?php

declare(strict_types=1);

namespace popp\ch04\batch13;

class Runner
{
    public static function run(): void
    {
        // $checkout = new Checkout();
        $checkout = new IllegalCheckout();
    }
}
