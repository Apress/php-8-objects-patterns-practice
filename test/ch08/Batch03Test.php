<?php

namespace popp\ch08\batch03;

require_once("vendor/autoload.php");

use popp\ch08\batch02\TimedCostStrategy;
use popp\ch08\batch02\FixedCostStrategy;
use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\Seminar;

use popp\test\BaseUnit;

class Batch03Test extends BaseUnit 
{
    function testLectureAndSeminar()
    {
        $lecture = new Lecture(4, new FixedCostStrategy());
        self::assertEquals("fixed rate", $lecture->chargeType());
        self::assertEquals(4, $lecture->getDuration());
        self::assertEquals(30, $lecture->cost());
    }

}
