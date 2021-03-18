<?php

declare(strict_types=1);

namespace popp\ch11\batch06;

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
/* listing 11.34 */
        $login = new Login();
        new SecurityMonitor($login);
        new GeneralLogger($login);
        new PartnershipTool($login);
/* /listing 11.34 */
    }
}
