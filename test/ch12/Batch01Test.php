<?php
declare(strict_types=1);

namespace popp\ch12\batch01;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit 
{

    public function testRunner()
    {
        $helper = new ApplicationHelper();
        $options = $helper->getOptions();
        self::assertEquals("sqlite:./data/woo.db", $options[0]);
    }
}
