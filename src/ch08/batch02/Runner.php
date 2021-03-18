<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\Seminar;

class Runner
{
    public static function run()
    {
/* listing 08.12 */
        $lessons[] = new Seminar(4, new TimedCostStrategy());
        $lessons[] = new Lecture(4, new FixedCostStrategy());

        foreach ($lessons as $lesson) {
            print "lesson charge {$lesson->cost()}. ";
            print "Charge type: {$lesson->chargeType()}\n";
        }
/* /listing 08.12 */
    }

    public static function run2()
    {
/* listing 08.17 */
        $lessons1 = new Seminar(4, new TimedCostStrategy());
        $lessons2 = new Lecture(4, new FixedCostStrategy());
        $mgr = new RegistrationMgr();
        $mgr->register($lessons1);
        $mgr->register($lessons2);
/* /listing 08.17 */
    }
}
