<?php
declare(strict_types=1);

namespace popp\ch11\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch04Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });

        self::assertMatchesRegularExpression("|Loggger: bob, ip: 158.152.55.35 status:\d/bob/158\\.152\\.55\\.35|", $val);
        self::assertMatchesRegularExpression("|Notifier: bob, ip: 158.152.55.35 status:\d/bob/158\\.152\\.55\\.35|", $val);
    }
}
