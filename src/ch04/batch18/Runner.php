<?php

declare(strict_types=1);

namespace popp\ch04\batch18;

class Runner
{
    public static function run()
    {
/* listing 04.90 */
        $person = new Person(new PersonWriter());
        $person->writeName();
/* /listing 04.90 */
        $person->writeAge();
    }
}
