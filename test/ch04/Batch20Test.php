<?php
declare(strict_types=1);

namespace popp\ch04\batch20;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch20Test extends BaseUnit 
{

    public function testRunner()
    {
        list($person1, $person2) = Runner::run();
        self::assertNotSame($person1, $person2);
        self::assertEquals(343, $person1->getId());
        self::assertEquals(0, $person2->getId());
        
    }
}
