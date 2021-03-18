<?php

declare(strict_types=1);

namespace popp\ch04\batch15;

class Runner
{

    public static function run()
    {
/* listing 04.82 */
        $p = new Person();
        print $p->name;
/* /listing 04.82 */
    }

    public static function run2()
    {
/* listing 04.84 */
        $p = new Person();
        if (isset($p->name)) {
            print $p->name;
        }
/* /listing 04.84 */
        // output:
        // Bob
    }
}
