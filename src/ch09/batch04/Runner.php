<?php

declare(strict_types=1);

namespace popp\ch09\batch04;

class Runner
{
    public static function run()
    {
/* listing 09.14 */
        $pref = Preferences::getInstance();
        $pref->setProperty("name", "matt");

        unset($pref); // remove the reference

        $pref2 = Preferences::getInstance();
        print $pref2->getProperty("name") . "\n"; // demonstrate value is not lost
/* /listing 09.14 */
    }
}
