<?php
declare(strict_types=1);

namespace popp\ch11\batch05;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("|sending mail to sysadmin|", $val);
        self::assertMatchesRegularExpression("|add login data to log|", $val);
        
        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("|doing something with status info|", $val);

    }

}
