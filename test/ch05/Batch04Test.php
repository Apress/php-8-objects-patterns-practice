<?php
declare(strict_types=1);

namespace popp\ch05\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch04Test extends BaseUnit 
{

    /*
    // uncomment for fatal error - namespace clash
    public function testClash()
    {
        //require_once("src/ch05/batch04/clash.php");
    }
    */

    public function testRunner()
    {
        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::runbefore(); });
        $expected = <<<EXPECTED
hello from popp\ch05\batch04\Debug

EXPECTED;
        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;

        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run2(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;

        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run3(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;

        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run4(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;
        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run5(); });
        $expected = <<<EXPECTED
hello from popp\ch05\batch04\Debug

EXPECTED;

        self::assertEquals($expected, $val);

        // /////////////////////////////////////////////////////////////////////

        $val = $this->capture(function() { Runner::run8(); });
        self::assertEquals("saying hi from root", $val);

        $val = $this->capture(function() { Runner::run9(); });
        self::assertEquals("saying hi from underscore file", $val);




        $val = $this->capture(function() { Runner::run10(); });
        self::assertEquals("hello from util\\LocalPath", $val);

        $val = $this->capture(function() { Runner::run10_2(); });
        self::assertEquals("hello from util\\LocalPath", $val);

        $val = $this->capture(function() { Runner::run11(); });
        $expected = "saying hi from underscore filehello from util\\LocalPath";
        self::assertEquals($expected, $val);
    }

    public function testUnClash()
    {
        $val = $this->capture(function() { 
            require_once("src/ch05/batch04/unclash.php");
        });
        self::assertEquals("hello from popp\ch05\batch04\Debug\n", $val);
    }

    public function testMulti()
    {
        $val = $this->capture(function() { 
            require_once("src/ch05/batch04/Multi.php");
        });
        self::assertEquals("hello from Debug\n", $val);
    }


    public function testMain()
    {
        // force include
        $val = $this->capture(function() { Runner::runbefore(); });

        self::expectException(\Error::class);
        \main\mainrun1();
    }

    public function testMain2()
    {
        // force include
        $val = $this->capture(function() { Runner::runbefore(); });

        $val = $this->capture(function() { \main\mainrun2(); });
        $expected = <<<EXPECTED
hello from popp\ch05\batch04\Debug

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testMain3()
    {
        // force include
        $val = $this->capture(function() { Runner::runbefore(); });

        $val = $this->capture(function() { \main\mainrun3(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testMain4()
    {
        // force include
        $val = $this->capture(function() { Runner::runbefore(); });

        $val = $this->capture(function() { \main\mainrun4(); });
        $expected = <<<EXPECTED
hello from Debug

EXPECTED;

        self::assertEquals($expected, $val);
    }


    public function testRunner7()
    {
        $val = $this->capture(function() { Runner::run7(); });
        $expected = <<<EXPECTED
hello from popp\ch05\batch04\util
hello from root namespace

EXPECTED;

        self::assertEquals($expected, $val);
    }

    public function testRunRequires()
    {
        $val = $this->capture(function() { Runner::runRequires(); });
        self::assertEquals("CustomerWebToolsUser", $val);
    }
}
