<?php
declare(strict_types=1);

namespace popp\ch04\batch09;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch09Test extends BaseUnit 
{
    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        self::assertMatchesRegularExpression("/user: bob/", $val);
        self::assertMatchesRegularExpression("/host: localhost/", $val);
    }

    public function testConf()
    {
        $path = Runner::writeConf();
        $conf = new Conf($path);
        self::assertTrue($conf instanceof Conf);
        self::assertEquals("bob", $conf->get('user'));
        self::assertEquals("localhost", $conf->get('host'));
        self::assertEquals("newpass", $conf->get('pass'));
        $conf->set("pass", "newpass2");
        $conf->write();
        self::assertEquals("newpass2", $conf->get('pass'));
        
    }

}
