<?php

declare(strict_types=1);

namespace popp\ch11\batch05;

class Runner
{
    public static function run()
    {
        $login = new Login();

        new SecurityMonitor($login);
        new GeneralLogger($login);

        $pt = new PartnershipTool($login);
        $login->detach($pt);

        for ($x = 0; $x < 10; $x++) {
            $login->handleLogin("bob", "mypass", '158.152.55.35');
            print "\n";
        }
    }

    public static function run2()
    {
        $login = new Login();
        $la = new LoginAnalytics();
        $login->attach($la);

        for ($x = 0; $x < 10; $x++) {
            $login->handleLogin("bob", "mypass", '158.152.55.35');
            print "\n";
        }
    }
}
