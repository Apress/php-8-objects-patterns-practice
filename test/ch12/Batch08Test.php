<?php
declare(strict_types=1);

namespace popp\ch12\batch08;
use popp\ch12\batch06\Request;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch08Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/choose a name for the venue/", $val);
        //print $val;
        
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/name is a required field/", $val);
        //print $val;

        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression("/Listing venues/", $val);
        //print $val;
    }

    public function testPageController() {
        $test = new class extends PageController {
            public function process(): void {} 
        };
        $controller = new $test();
        $controller->init();
        $request = $controller->getRequest();
        self::assertTrue($request instanceof Request);

        ob_start();
        $controller->forward(__DIR__."/error.php");
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "this is an error\n");
    }

}
