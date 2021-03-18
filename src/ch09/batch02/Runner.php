<?php

declare(strict_types=1);

namespace popp\ch09\batch02;

class Runner
{
    public static function run()
    {
/* listing 09.07 */
        $boss = new NastyBoss();
        $boss->addEmployee(new Minion("harry"));
        $boss->addEmployee(new CluedUp("bob"));
        $boss->addEmployee(new Minion("mary"));
        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();
/* /listing 09.07 */
    }
}
