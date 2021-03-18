<?php

declare(strict_types=1);

namespace popp\ch04\batch06_4;

class Runner
{
    public static function run()
    {
/* listing 04.37 */
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
/* /listing 04.37 */
    }
}
