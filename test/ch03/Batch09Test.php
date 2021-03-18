<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch09\ShopProduct;
use popp\ch03\batch09\AddressManager;
use popp\ch03\batch09\Runner;

class Batch09Test extends TestCase
{
    public function testShopProduct()
    {
        $product = new ShopProduct(
            "title",
            "first",
            "main",
            3.22
        );
        self::assertEquals($product->getProducer(), "first main");

        try {
            $product = new ShopProduct("title", "first", "main", []);
            //self::fail("Exception should have been thrown");
        } catch (\TypeError $e) {
        }

        try {
            Runner::run1();
            self::fail("Exception should have been thrown");
        } catch (\TypeError $e) {

        }

        $product = new ShopProduct(
            "title",
            "first",
            "main",
            "3.22"
        );

        self::assertEquals($product->getPrice(), 3.22);
        self::assertEquals(gettype($product->getPrice()), "double");

        ob_start();
        Runner::run2();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals($output, "4.22");
    }

    public function testAddressManager()
    {
        $aman = new AddressManager();
 
        ob_start();
        $aman->outputAddresses(false);
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output1);

        ob_start();
        $aman->outputAddresses(true);
        $output2 = ob_get_contents();
        ob_end_clean();
        self::assertMatchesRegularExpression("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output2);

        ob_start();
        Runner::run3();
        $output2 = ob_get_contents();
        ob_end_clean();
        // passes "false" - which should resolve to true in non-strict mode
        self::assertMatchesRegularExpression("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output2);


/*
        ob_start();
        $aman->outputAddresses("no");
        //$aman->outputAddresses(null);
        //$aman->outputAddresses(-1);
        //$aman->outputAddresses($aman);
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output1);

        ob_start();
        $aman->outputAddresses("false");
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output1);

        ob_start();
        $aman->outputAddresses("nottrue");
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertMatchesRegularExpression("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output1);

        ob_start();
        $aman->outputAddresses("xxxxx");
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertMatchesRegularExpression("|209.131.36.159 \\(.*?\\)\n216.58.213.174 \\(.*?\\)\n|", $output1);

        ob_start();
        $aman->outputAddresses("off");
        $output1 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output1);


        ob_start();
        Runner::run2();
        $output3 = ob_get_contents();
        ob_end_clean();
        // should be mistakenly true (because "false" == true)
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output3);
*/
    }
}
