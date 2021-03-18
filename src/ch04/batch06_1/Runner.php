<?php

declare(strict_types=1);

namespace popp\ch04\batch06_1;

class Runner
{
    public static function run()
    {
/* listing 04.28 */
        $p = new ShopProduct();
        print $p->calculateTax(100) . "\n";

        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
/* /listing 04.28 */
    }
}
