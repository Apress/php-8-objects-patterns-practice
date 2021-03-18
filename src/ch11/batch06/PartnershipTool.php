<?php

declare(strict_types=1);

namespace popp\ch11\batch06;

class PartnershipTool extends LoginObserver
{
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // check $ip address
        // set cookie if it matches a list
        print __CLASS__ . ":\tset cookie if it matches a list\n";
    }
}
