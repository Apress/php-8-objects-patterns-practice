<?php
declare(strict_types=1);

namespace popp\ch12\batch06;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch06Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/Welcome to WOO/", $val);
        //print $val;
        
    }

    protected function setUp(): void {
        Registry::reset();
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
        self::assertEquals($dsn, "sqlite:/var/popp/src/ch12/batch06/data/woo.db");
    }

    function testViewComponentCompiler() {
        $conf = new Conf();
        $conf->set("templatepath", __DIR__);
        $reg = Registry::instance();
        $reg->setConf($conf);


        $parser = new ViewComponentCompiler();
        $xml = <<<BLAH
<xx>
<control>
    <command path="/" class="\popp\ch12\batch06\DefaultCommand">
        <view name="main" />
        <status value="CMD_ERROR"> 
            <view name="error" />
        </status>
        <status value="CMD_INSUFFICIENT_DATA"> 
            <forward path="/somewhere/else" />
        </status>
    </command>
</control>
</xx>
BLAH;
        $el = simplexml_load_string($xml);
        $components = $parser->parse($el);
        self::assertTrue(! is_null($components->get("/")));
        $comp = $components->get("/");
        $cmd = $comp->getCommand();
        self::assertTrue($cmd instanceof Command);
        $request = new TestRequest();

        // test view with default
        $request->setCmdStatus(Command::CMD_OK);
        $view = $comp->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is main\n");

        $request->setCmdStatus(Command::CMD_ERROR);
        $view = $comp->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is an error\n");


        $request->setCmdStatus(Command::CMD_INSUFFICIENT_DATA);
        $view = $comp->getView($request);
        self::assertTrue($view instanceof ForwardViewComponent);
    }

    public function testApplicationController() {

        // set up basics
        $request = new TestRequest();
        $reg = Registry::instance();
        $reg->setRequest($request);

        $commands = new Conf();
        $resolver = new AppController();

        $conf = new Conf();
        $conf->set("templatepath", __DIR__);
        $reg->setConf($conf);

        // no path set or command set
        $reg->setCommands($commands);
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "no descriptor for /");
        self::assertTrue($cmd instanceof DefaultCommand);

        // non-matching path
        $request->clearFeedback();
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "no descriptor for /testcmd");
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path but no class
        $descriptor = new ComponentDescriptor("/testcmd", "\\popp\\NoSuchClass");
        $request->clearFeedback();
        $commands->set("/testcmd", $descriptor);
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals($feedback[0], "class '\\popp\\NoSuchClass' not found");
        self::assertTrue($cmd instanceof DefaultCommand);

        // matching path and existing class
        // - no template matched
        $descriptor = new ComponentDescriptor("/testcmd", "\\popp\\test\\ch12\\TestCommandBatch06");
        $request->clearFeedback();
        $commands->set("/testcmd", $descriptor);
        $request->setPath("/testcmd");
        $cmd = $resolver->getCommand($request);
        $feedback = $request->getFeedback();
        self::assertEquals(count($feedback), 0);
        self::assertTrue($cmd instanceof \popp\test\ch12\TestCommandBatch06);

        $view = $resolver->getView($request);

        ob_start();
        $view->render($request);
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is fallback\n");

        // matching path and existing class
        // - template matched / default
        $descriptor->setView(Command::CMD_DEFAULT, new TemplateViewComponent("main"));
        $descriptor->setView(Command::CMD_ERROR, new TemplateViewComponent("error"));
        $view = $resolver->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is main\n");

        // matching path and existing class
        // - template matched / default
        $request->setCmdStatus(Command::CMD_ERROR);
        $view = $resolver->getView($request);
        ob_start();
        $view->render($request);
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is an error\n");

    }

}
