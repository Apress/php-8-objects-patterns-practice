<?php

declare(strict_types=1);

namespace popp\ch09\batch01;

class Runner
{
    public static function run()
    {
/* listing 09.04 */
        $boss = new NastyBoss();
        $boss->addEmployee("harry");
        $boss->addEmployee("bob");
        $boss->addEmployee("mary");
        $boss->projectFails();
/* /listing 09.04 */
    }
}
