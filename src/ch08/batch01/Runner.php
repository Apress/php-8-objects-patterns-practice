<?php

declare(strict_types=1);

namespace popp\ch08\batch01;

use popp\ch08\batch01\Lecture;
use popp\ch08\batch01\Seminar;

class Runner
{
    public static function run()
    {
/* listing 08.04 */
        $lecture = new Lecture(5, Lesson::FIXED);
        print "{$lecture->cost()} ({$lecture->chargeType()})\n";

        $seminar = new Seminar(3, Lesson::TIMED);
        print "{$seminar->cost()} ({$seminar->chargeType()})\n";
/* /listing 08.04 */
    }
}
