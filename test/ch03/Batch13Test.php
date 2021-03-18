<?php
declare(strict_types=1);
namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch13\Storage;
use popp\ch03\batch13\ShopProduct;
use popp\ch03\batch13\BookProduct;
use popp\ch03\batch13\CdProduct;
use popp\ch03\batch13\Runner;

class Batch13Test extends TestCase
{
    public function testStorage()
    {
        $s = new Storage();
        list($key, $value) = $s->add("key", "value");
        self::assertEquals($key, "key");
        self::assertEquals($value, "value");
        $this->expectException(\TypeError::class);
        $s->add("key", 9);
    }

    public function testShopProcuct()
    {

        $test3 = new CdProduct("cdtitle", "first", "main", 99, 88);
        self::assertEquals("cdtitle ( main, first ): playing time - 88", $test3->getSummaryLine());

        $test4 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $test4->getSummaryLine());

    }
}
