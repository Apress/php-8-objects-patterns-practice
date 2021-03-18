<?php

namespace popp\ch15\batch01;

require_once("vendor/autoload.php");
require_once("src/ch15/batch01/phpcsBroken.php");

use popp\test\BaseUnit;

class Batch01Test extends BaseUnit
{
    public function testEarthGAme()
    {
        $earthgame = new EarthGame(5, "earth", true, true);
        self::assertTrue($earthgame instanceof EarthGame);
        $tiles = $earthgame::generateTile(5, true);
        self::assertEquals(count($tiles), 5);
    }

    public function testEbookParser()
    {
        $ep = new ebookParser("name", 5);
        self::assertTrue($ep instanceof EbookParser);
    }

    public function testIndex()
    {
        $val = $this->capture(function() { Runner::index(); });
        $expected = "loaded popp\ch15\batch01\Tree\n";
        self::assertEquals($expected, $val);
    }
}


