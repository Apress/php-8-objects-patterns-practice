<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch07\AddressManager;

// no need to create a copy in this batch
use popp\ch03\batch04\ShopProduct;
use popp\ch03\batch07\ShopProductWriter;
use popp\ch03\batch07\Runner;

class Batch07Test extends TestCase
{
    public function testAddressManager()
    {
        $aman = new AddressManager();
        self::assertTrue($aman instanceof AddressManager);
    }

    public function testProductWriter()
    {
        
        $product = new ShopProduct("title", "first", "main", 99);
        self::assertTrue($product instanceof ShopProduct);
        self::assertEquals($product->title, "title");
        self::assertEquals($product->producerFirstName, "first");
        self::assertEquals($product->producerMainName, "main");
        self::assertEquals($product->price, 99);
        $spw = new ShopProductWriter();

        ob_start();
        $spw->write($product);
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("title: first main (99)\n", $output1);
       
        ob_start();
        Runner::run1();
        $output2 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("My Antonia: Willa Cather (5.99)\n", $output2);

    }
}
