<?php
declare(strict_types=1);

namespace popp\ch04\batch18;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch18Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertEquals("Bob\n44\n", $val);
    }

    public function testOtherPerson()
    {
        $val = $this->capture(function() { 
            $person = new OtherPerson(new PersonWriter());
            $person->writeName();
        });
        self::assertEquals("Bob\n", $val);
    }
}
