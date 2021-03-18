<?php

declare(strict_types=1);

namespace popp\ch12\batch04;

class Runner
{
    public static function run()
    {
        $reg = Registry::instance();
        $reg2 = Registry::instance();
        print_r($reg2->getRequest());
        print_r($reg2->treeBuilder());

        // testing the system

/* listing 12.08 */
        Registry::testMode();
        $mockreg = Registry::instance();
/* /listing 12.08 */

        print_r($mockreg);
        Registry::testMode(false);
        $reg4 = Registry::instance();
        print_r($reg4);
    }
}
