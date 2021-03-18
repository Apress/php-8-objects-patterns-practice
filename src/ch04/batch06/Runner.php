<?php

declare(strict_types=1);

namespace popp\ch04\batch06;

class Runner
{
    public static function run()
    {
        print_r(Document::create());
    }

    public static function run2()
    {
/* suspended_listing 04.11 */
        $p = new ShopProduct("Fine Soap", "", "Bob's Bathroom", 1.33);
        print $p->calculateTax(100) . "\n";
/* /suspended_listing 04.11 */
    }

    public static function run3()
    {
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
    }
}
