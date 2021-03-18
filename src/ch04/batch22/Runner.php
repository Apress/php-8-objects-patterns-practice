<?php

declare(strict_types=1);

namespace popp\ch04\batch22;

class Runner
{
    public static function run()
    {
/* listing 04.106 */
        $st = new StringThing();
        print $st;
/* /listing 04.106 */
    }

    public static function run2()
    {
/* listing 04.108 */
        $person = new Person();
        print $person;
/* /listing 04.108 */
        // Bob (age 44)
    }

    public static function run3()
    {
        $person = new Person();
        self::printThing($person);
    }

/* listing 04.109 */
    public static function printThing(string|\Stringable $str): void
    {
        print $str;
    }
/* /listing 04.109 */
}
