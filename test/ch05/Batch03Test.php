<?php
declare(strict_types=1);

namespace popp\ch05\batch01;

require_once("vendor/autoload.php");
require_once(__DIR__."/../../src/ch05/batch03/my/Outputter.php");

use popp\test\BaseUnit;
use my\Outputter;

class Batch03Test extends BaseUnit 
{

    public function testBatch03Outputter()
    {
        $o = new Outputter();
        self::assertTrue($o instanceof \my\Outputter);
    }
}

