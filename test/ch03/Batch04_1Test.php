<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch04_1\ShopProduct;
use popp\ch03\batch04_1\Runner;

class Batch04_1Test extends TestCase
{
    public function testProduct()
    {
        
        $blah = new ShopProduct("title", "first", "main", 99);
        self::assertTrue($blah instanceof ShopProduct);
        self::assertEquals($blah->title, "title");
        self::assertEquals($blah->producerFirstName, "first");
        self::assertEquals($blah->producerMainName, "main");
        self::assertEquals($blah->price, 99);
        
        ob_start();
        Runner::run1();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\n", $output);
    }
}
