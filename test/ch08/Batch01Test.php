<?php

namespace popp\ch08\batch01;

require_once("vendor/autoload.php");

use popp\ch08\batch01\Lecture;
use popp\ch08\batch01\Seminar;
use popp\ch08\batch01\Runner;
use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{
    function testLectureAndSeminar()
    {
        $lecture = new Lecture(5, Lesson::FIXED);
        self::assertEquals($lecture->cost(), 30);
        self::assertEquals($lecture->chargeType(), "fixed rate");
        $seminar= new Seminar(3, Lesson::TIMED);
        self::assertEquals($seminar->cost(), 15);
        self::assertEquals($seminar->chargeType(), "hourly rate");
    }

    function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals($val, "30 (fixed rate)\n15 (hourly rate)\n");
    }

}
