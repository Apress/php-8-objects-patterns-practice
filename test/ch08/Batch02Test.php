<?php

namespace popp\ch08\batch02;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch02Test extends BaseUnit 
{
    function testLectureAndSeminar()
    {
        $seminar = new Seminar(4, new TimedCostStrategy());
        self::assertEquals("hourly rate", $seminar->chargeType());
        self::assertEquals(4, $seminar->getDuration());
        self::assertEquals(20, $seminar->cost());

        $lecture = new Lecture(4, new FixedCostStrategy());
        self::assertEquals("fixed rate", $lecture->chargeType());
        self::assertEquals(4, $lecture->getDuration());
        self::assertEquals(30, $lecture->cost());
    }

    function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = "lesson charge 20. Charge type: hourly rate\nlesson charge 30. Charge type: fixed rate\n";
        self::assertEquals($val, $expected);
    }

    function testRunner2()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/notification: new/", $val);
        self::assertMatchesRegularExpression("/cost/", $val);
    }


}
