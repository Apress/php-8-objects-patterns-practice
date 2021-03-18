<?php
declare(strict_types=1);

namespace popp\ch04\batch24;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch24Test extends BaseUnit
{

    public function testRunnerPrint()
    {
        $val = $this->capture(function () {
            Runner::run();
        });
        self::assertEquals("Bob 44\n", $val);
    }

    public function testRunnerWrite()
    {
        $path = "/tmp/persondump";
        if (file_exists($path)) {
            unlink($path);
        }
        $val = $this->capture(function () {
            Runner::run2();
        });
        $val = file_get_contents($path);
        self::assertEquals("Bob 44\n", $val);
    }

}
