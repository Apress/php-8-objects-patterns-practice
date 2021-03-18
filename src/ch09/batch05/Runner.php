<?php

declare(strict_types=1);

namespace popp\ch09\batch05;

class Runner
{
    public static function run()
    {
        // runner code here
        $pref = Preferences::getInstance();
        print $pref->getDsn();

        Preferences::mockmode();
        $pref = Preferences::getInstance();

        print $pref->getDsn();
    }

}
