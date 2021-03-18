<?php

declare(strict_types=1);

namespace popp\ch09\batch06;

class Runner
{
    public static function run()
    {
        $mgr = new CommsManager();
        $encoder = $mgr->getApptEncoder();
        $out = $encoder->encode();
        print "{$out}\n";
    }
}
