<?php

declare(strict_types=1);

namespace popp\ch04\batch01;

class Runner
{
    public static function run()
    {
/* listing 04.02 */
        print StaticExample::$aNum;
        StaticExample::sayHello();
/* /listing 04.02 */
    }

    public static function run2()
    {
        StaticExample2::sayHello();
        StaticExample2::sayHello();
        StaticExample2::sayHello();
    }
}
