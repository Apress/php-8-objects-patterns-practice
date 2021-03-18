<?php

namespace popp\ch05\batch04\util;

class InSame
{
    public static function run(): void
    {
        Debug::helloworld();
    }

    public static function runError(): void
    {
        // popp\ch05\batch04\util\Debug::helloworld();

        \popp\ch05\batch04\util\Debug::helloworld();
    }
}
