<?php
declare(strict_types=1);

namespace popp\ch12\batch11;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch12\batch06\Registry;

class Batch11Test extends BaseUnit 
{

    public function testRunner()
    {
        $venue = Runner::run();
        self::assertEquals("bob's house", $venue->getName());
        $spaces = $venue->getSpaces();
        self::assertTrue($spaces instanceof SpaceCollection);
    }
}
