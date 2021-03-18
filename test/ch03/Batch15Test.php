<?php
declare(strict_types=1);
namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch15\Storage;
use popp\ch03\batch15\ShopProduct;
use popp\ch03\batch15\BookProduct;
use popp\ch03\batch15\CdProduct;
use popp\ch03\batch15\ShopProductWriter;

class Batch15Test extends TestCase
{

    public function testStorage()
    {
        $s = new Storage();
        list($key, $value) = $s->add("key", "value");
        self::assertEquals($key, "key");
        self::assertEquals($value, "value");

        list($key, $value) = $s->add("key2", null);
        self::assertEquals($key, "key2");
        self::assertNull($value);

        $this->expectException(\TypeError::class);
        $s->add("key", false);
    }

    public function testShopProcuct()
    {

        $test4 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $test4->getSummaryLine());

        $book = new BookProduct("booktitle", "first", "main", 99, 200);
        $book->setDiscount(10);
        self::assertEquals($book->getPrice(), 99);

        $cd = new CdProduct("cdtitle", "first", "main", 99.0, 200);
        $cd->setDiscount(10);
        self::assertEquals($cd->getPrice(), 89);
        self::assertEquals($cd->getPlaylength(), 200);

    

        $writer = new ShopProductWriter();
        $writer->addProduct($book);
        $writer->addProduct($cd);

        ob_start();
        $writer->write();
        $out4 = ob_get_contents();
        ob_end_clean();
        self::assertEquals($out4, "booktitle: first main (99)\ncdtitle: first main (89)\n");
    }
}
