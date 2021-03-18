<?php
declare(strict_types=1);

namespace popp\ch12\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        //print $val;
        self::assertMatchesRegularExpression("/Welcome to WOO/", $val);

        $e = new AppException();    
        self::assertTrue($e instanceof AppException);
    }

    public function testRegistry() {
        $request = new TestRequest();
        $reg = Registry::instance();
        $reg->setRequest($request);

        $conf = $reg->getConf();
        self::assertTrue($conf instanceof Conf);

        $request = $reg->getRequest();
        self::assertTrue($request instanceof Request);
    }

    public function testApplicationHelper() {
        $helper = new ApplicationHelper();
            $helper->init();
        $reg = Registry::instance();
        $dsn = $reg->getDSN();
        self::assertEquals($dsn, "sqlite:/var/popp/src/ch12/batch05/data/woo.db");
    }

    public function testCommandResolver() {

        // set up basics
        $request = new TestRequest();
        $reg = Registry::instance();
        $reg->setRequest($request);

        $commands = new Conf();
        $resolver = new CommandResolver();         

        //$commands->set("testcmd", "\\popp\\test\\ch12\\TestCommand");

        // no path set
        $reg->setCommands($commands);
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "path '/' not matched");
        self::assertTrue($cmd instanceof DefaultCommand);

        // non-matching path
        $request->clearFeedback();
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "path '/testcmd' not matched");
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path but no class
        $request->clearFeedback();
        $commands->set("/testcmd", "\\popp\\NoSuchClass");
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "class '\\popp\\NoSuchClass' not found");
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path and existing class
        $request->clearFeedback();
        $commands->set("/testcmd", "\\popp\\test\\ch12\\TestCommandBatch05");
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals(count($feedback), 0);
        self::assertTrue($cmd instanceof \popp\test\ch12\TestCommandBatch05);
    }
}


