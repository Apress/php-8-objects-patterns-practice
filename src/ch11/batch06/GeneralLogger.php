<?php

declare(strict_types=1);

namespace popp\ch11\batch06;

class GeneralLogger extends LoginObserver
{
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // add login data to log
        print __CLASS__ . ":\tadd login data to log\n";
    }
}
