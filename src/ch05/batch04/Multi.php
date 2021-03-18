<?php

/* listing 05.20 */
namespace com\getinstance\util {

    class Debug
    {
        public static function helloWorld(): void
        {
            print "hello from Debug\n";
        }
    }
}

namespace other {

    \com\getinstance\util\Debug::helloWorld();
}
/* /listing 05.20 */
