<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch06\AddressManager;
use popp\ch03\batch06\Runner;

class Batch06Test extends TestCase
{
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
        $aman->outputAddresses("no");
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
        Runner::run1();
        $output3 = ob_get_contents();
        ob_end_clean();
        // should be mistakenly true (because "false" == true)
        self::assertEquals("209.131.36.159\n216.58.213.174\n", $output3);
    }
}
