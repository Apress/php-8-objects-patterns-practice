<?php
declare(strict_types=1);
namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch12\Storage;
use popp\ch03\batch12\ShopProduct;
use popp\ch03\batch12\BookProduct;
use popp\ch03\batch12\CdProduct;
use popp\ch03\batch12\Runner;

class Batch12Test extends TestCase
{
    public function testStorage()
    {
        $s = new Storage();
        list($key, $value) = $s->add("key", "value");
        self::assertEquals($key, "key");
        self::assertEquals($value, "value");
        list($key, $value) = $s->add("key", 9);
        self::assertEquals($key, false);
    }

    public function testShopProcuct()
    {
        $test3 = new CdProduct("cdtitle", "first", "main", 99, 0, 88);
        self::assertEquals("cdtitle ( main, first ): playing time - 88", $test3->getSummaryLine());

        $test4 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $test4->getSummaryLine());

        ob_start();
        Runner::run1();
        $out4 = ob_get_contents();
        ob_end_clean();
        self::assertEquals($out4, "artist: The Alabama 3\n");

    }
}
