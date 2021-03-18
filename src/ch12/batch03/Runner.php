<?php

declare(strict_types=1);

namespace popp\ch12\batch03;

class Runner
{
    public static function run()
    {
        // runner code here
        $reg = Registry::instance();
        $reg->set('request', new Request());

        $reg = Registry::instance();
        print_r($reg->get('request'));
    }
}
