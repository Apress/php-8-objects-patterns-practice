<?php
declare(strict_types=1);

namespace popp\ch05\batch08;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch08Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $expected = <<<EXPECTED
PersonModule::setPerson(): bob
FtpModule::setHost(): example.com
FtpModule::setUser(): anon

EXPECTED;

        self::assertEquals($expected, $val);

        
    }
}
