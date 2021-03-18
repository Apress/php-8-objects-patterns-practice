<?php

declare(strict_types=1);

namespace popp\ch04\batch06_2;

class Runner
{
    public static function run()
    {
/* listing 04.31 */
        $p = new ShopProduct();
        print $p->calculateTax(100) . "\n";
        print $p->generateId() . "\n";
/* /listing 04.31 */
    }
}
