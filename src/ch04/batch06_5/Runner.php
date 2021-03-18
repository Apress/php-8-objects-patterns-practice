<?php

declare(strict_types=1);

namespace popp\ch04\batch06_5;

class Runner
{
    public static function run()
    {
/* listing 04.39 */
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
        print $u->basicTax(100) . "\n";
/* /listing 04.39 */
    }
}
