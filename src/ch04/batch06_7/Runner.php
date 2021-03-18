<?php

declare(strict_types=1);

namespace popp\ch04\batch06_7;

class Runner
{
    public static function run()
    {
/* suspended_listing 04.38 */
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
/* /suspended_listing 04.38 */
    }
}
