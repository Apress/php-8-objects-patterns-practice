<?php

namespace popp\ch10\batch01;

class Runner
{
    public static function run()
    {
/* listing 10.03 */
        $unit1 = new Archer();
        $unit2 = new LaserCannonUnit();
        $army = new Army();
        $army->addUnit($unit1);
        $army->addUnit($unit2);
        print $army->bombardStrength();
/* /listing 10.03 */
    }
}
