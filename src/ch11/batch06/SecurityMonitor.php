<?php

declare(strict_types=1);

namespace popp\ch11\batch06;

class SecurityMonitor extends LoginObserver
{
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        if ($status[0] == Login::LOGIN_WRONG_PASS) {
            // send mail to sysadmin
            print __CLASS__ . ":\tsending mail to sysadmin\n";
        }
    }
}
