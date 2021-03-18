<?php
declare(strict_types=1);

namespace popp\ch09\batch14;

use popp\ch09\batch06\BloggsApptEncoder;
use popp\ch09\batch11\TerrainFactory;


require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch09\batch11\EarthSea;
use popp\ch09\batch11\MarsPlains;
use popp\ch09\batch11\Forest;
use popp\ch09\batch11\EarthForest;

class Batch14Test extends BaseUnit
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertEquals($val, "Appointment data encoded in BloggsCal format\n");
        
    }

    public function testAssembler()
    {
        $assembler = new ObjectAssembler("src/ch09/batch14/objects.xml");
        $component = $assembler->getComponent(TerrainFactory::class);

        self::assertTrue($component->getSea() instanceof EarthSea);
        self::assertTrue($component->getPlains() instanceof MarsPlains);
        self::assertTrue($component->getForest() instanceof EarthForest);

        $apptmaker = $assembler->getComponent(AppointmentMaker2::class);
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }


    public function testNaiveEncoder()
    {
        $apptmaker = new AppointmentMaker();
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }

    public function testLessNaiveEncoder()
    {
        $apptmaker = new AppointmentMaker2(new BloggsApptEncoder());
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }
}
