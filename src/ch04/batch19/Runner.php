<?php

declare(strict_types=1);

namespace popp\ch04\batch19;

class Runner
{
    public static function run()
    {
        // runner code here

/* listing 04.95 */
        $person = new Person("bob", 44);
        $person->setId(343);
        unset($person);
/* /listing 04.95 */
    }

    public static function run2()
    {
/* listing 04.97 */

        $first = new CopyMe();
        $second = $first;

        // PHP 4: $second and $first are 2 distinct objects
        // PHP 5 plus: $second and $first refer to one object
/* /listing 04.97 */
        return [$first, $second];
    }

    public static function run3()
    {
/* listing 04.98 */

        $first = new CopyMe();
        $second = clone $first;

        // PHP 5 plus: $second and $first are 2 distinct objects
/* /listing 04.98 */
        return [$first, $second];
    }
}
