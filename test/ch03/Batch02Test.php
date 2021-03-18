<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch02\ShopProduct;
use popp\ch03\batch02\Runner;

class Batch02Test extends TestCase
{
    public function testProduct()
    {
        // 03.04
        $blah = new ShopProduct();
        self::assertTrue($blah instanceof ShopProduct);
        
        ob_start();
        Runner::run1();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertMatchesRegularExpression("|default product|", $output);
       
        ob_start();
        Runner::run2();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("My Antonia\nCatch 22\n", $output);

        ob_start();
        Runner::run3();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("treehouse\n", $output);

        ob_start();
        Runner::run4();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\n", $output);

        ob_start();
        Runner::run5();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Shirley Jackson\n", $output);

        ob_start();
        Runner::run6();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Shirley main name\n", $output);
    }
}
