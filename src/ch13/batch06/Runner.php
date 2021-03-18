<?php

declare(strict_types=1);

namespace popp\ch13\batch06;

class Runner
{
    public static function run()
    {
/* listing 13.38 */

        $idobj = new EventIdentityObject();
        $idobj->setMinimumStart(time());
        $idobj->setName("A Fine Show");
        $comps = [];
        $name = $idobj->getName();

        if (! is_null($name)) {
            $comps[] = "name = '{$name}'";
        }

        $minstart = $idobj->getMinimumStart();

        if (! is_null($minstart)) {
            $comps[] = "start > {$minstart}";
        }

        $start = $idobj->getStart();

        if (! is_null($start)) {
            $comps[] = "start = '{$start}'";
        }

        $clause = " WHERE " . implode(" and ", $comps);

        print "{$clause}\n";
/* /listing 13.38 */
    }
}
