<?php
declare(strict_types=1);

namespace popp\ch04\batch10;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch09\Runner as Runner09;

class Batch10Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertMatchesRegularExpression("/user: bob/", $val);
        self::assertMatchesRegularExpression("/host: localhost/", $val);       
    }

    public function testRunnerException()
    {
        $this->expectException(\Exception::class);
        Runner::run2();
    }

    public function testConfAbsent() {
        $this->expectException(\Exception::class);
        $conf = new Conf("/root/not_there.xml");
    }

    public function testConfUnwriteable() {
        $path = "/tmp/unwriteable.xml";
        if (! file_exists($path)) {
            $path = Runner09::writeConf($path);
        }
        chmod($path, 0500);
        $conf = new Conf($path);
        $conf->set("pass", "newpass");
        $this->expectException(\Exception::class);
        $conf->write();
    }

    public function testRunnerExceptionNonCapture()
    {
        $val = Runner::run3();
        self::assertEquals(100, $val);
    }

}
