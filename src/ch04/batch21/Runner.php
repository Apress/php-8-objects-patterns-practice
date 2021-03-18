<?php

declare(strict_types=1);

namespace popp\ch04\batch21;

class Runner
{
    public static function run()
    {
/* listing 04.103 */
        $person = new Person("bob", 44, new Account(200));
        $person->setId(343);
        $person2 = clone $person;

        // give $person some money
        $person->account->balance += 10;
        // $person2 sees the credit too
        print $person2->account->balance;

        // output:
        // 210
/* /listing 04.103 */
    }

    public static function run2()
    {
        $person = new ShallowPerson("bob", 44, new Account(200));
        $person->setId(343);
        $person2 = clone $person;

        // give $person some money
        $person->account->balance += 10;
        // $person2 sees the credit too
        print $person2->account->balance;

        // output:
        // 200
    }
}
