<?php

declare(strict_types=1);

namespace popp\ch11\batch04;

class Runner
{
    public static function run()
    {
        $login = new Login();
        for ($x = 1; $x < 20; $x++) {
            $login->handleLogin("bob", "mypass", '158.152.55.35');
        }
    }
}
