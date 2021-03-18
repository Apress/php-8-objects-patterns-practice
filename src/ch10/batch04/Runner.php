<?php

declare(strict_types=1);

namespace popp\ch10\batch04;

class Runner
{
    public static function run()
    {
/* listing 10.12 */
        // create an army
        $main_army = new Army();

        // add some units
        $main_army->addUnit(new Archer());
        $main_army->addUnit(new LaserCannonUnit());

        // create a new army
        $sub_army = new Army();

        // add some units
        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());
        $sub_army->addUnit(new Archer());

        // add the second army to the first
        $main_army->addUnit($sub_army);

        // all the calculations handled behind the scenes
        print "attacking with strength: {$main_army->bombardStrength()}\n";
/* /listing 10.12 */
    }
}
