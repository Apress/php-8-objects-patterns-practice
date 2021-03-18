<?php
declare(strict_types=1);

namespace popp\ch09\batch15;

use popp\ch09\batch06\BloggsApptEncoder;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch09\batch11\Sea;
use popp\ch09\batch11\Plains;
use popp\ch09\batch11\Forest;

use popp\ch09\batch11\EarthSea;
use popp\ch09\batch11\EarthPlains;
use popp\ch09\batch11\MarsPlains;
use popp\ch09\batch11\EarthForest;
use popp\ch09\batch11\MarsForest;

class Batch15Test extends BaseUnit
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertEquals($val, "Appointment data encoded in BloggsCal format\n");
        
    }

    public function testNonArgInjection()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $apptmaker = $assembler->getComponent(AppointmentMaker::class);
        self::assertTrue($apptmaker instanceof AppointmentMaker);
    }

    public function testNoArgsDefinedInstance()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $sea = $assembler->getComponent(Sea::class);
        self::assertTrue($sea instanceof EarthSea);

        $plains = $assembler->getComponent(Plains::class);
        self::assertTrue($plains instanceof MarsPlains);

        $forest = $assembler->getComponent(Forest::class);
        self::assertTrue($forest instanceof EarthForest);
    }

    public function testAttributeConstructor()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $terrainfactory = $assembler->getComponent(TerrainFactory::class);
        self::assertTrue($terrainfactory->getSea() instanceof EarthSea);
        self::assertTrue($terrainfactory->getPlains() instanceof MarsPlains);
        self::assertTrue($terrainfactory->getForest() instanceof EarthForest);
    }

    public function testAttributeSetter()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $apptmaker = $assembler->getComponent(AppointmentMaker::class);
        $output = $apptmaker->makeAppointment();
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $output);
    }

    public function testAttributeSetterRunner()
    {
        $val = $this->capture(function() { Runner::run3(); });
        //print $val;
        self::assertEquals("Appointment data encoded in BloggsCal format\n", $val);
    }

    public function testDefinedNoArgsNoInstance()
    {
        $assembler = new ObjectAssembler("src/ch09/batch15/objects.xml");
        $apptmaker = $assembler->getComponent(AppointmentMaker2::class);
        $out = $apptmaker->makeAppointment();
        self::assertEquals($out, "Appointment data encoded in BloggsCal format\n");
    }


}
