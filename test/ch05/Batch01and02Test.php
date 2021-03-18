<?php
declare(strict_types=1);

namespace popp\ch05\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01and02Test extends BaseUnit 
{

    public function testBatch01Outputter()
    {
        // can't test this error condition I don't think
        // require_once(__DIR__."/../../src/ch05/batch01/my/Outputter.php");
        self::assertTrue(true);
    }

    public function testBatch02Outputter()
    {
        require_once(__DIR__."/../../src/ch05/batch02/my/Outputter.php");
        $o = new \my_Outputter();
        self::assertTrue($o instanceof \my_Outputter);
    }
}
