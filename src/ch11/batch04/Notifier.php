<?php

declare(strict_types=1);

namespace popp\ch11\batch04;

class Notifier
{
    public static function mailWarning(string $user, string $ip, array $status): void
    {
        print "Notifier: $user, ip: $ip status:";
        print implode("/", $status);
        print "\n";
    }
}
