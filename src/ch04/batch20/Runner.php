<?php

declare(strict_types=1);

namespace popp\ch04\batch20;

class Runner
{
    public static function run()
    {
        // runner code here

/* listing 04.100 */
        $person = new Person("bob", 44);
        $person->setId(343);
        $person2 = clone $person;
/* /listing 04.100 */
        return [$person, $person2];
    }
}
