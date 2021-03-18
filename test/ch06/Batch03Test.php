<?php

namespace popp\ch06\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

use popp\ch03\batch12\ShopProduct;
use popp\ch03\batch12\CdProduct;
use popp\ch03\batch12\BookProduct;


class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $paramsfile = __DIR__."/../../src/ch06/batch03/params.xml";
        if ( file_exists($paramsfile)) {
            unlink($paramsfile);
        }

        $val = $this->capture(function() { Runner::run(); });
        self::assertTrue(file_exists($paramsfile));
        $txt = file_get_contents($paramsfile);
        print $val;

        self::assertMatchesRegularExpression("|<key>key1</key>|", $txt);
        self::assertMatchesRegularExpression("|<key>key2</key>|", $txt);
        self::assertMatchesRegularExpression("|<key>key3</key>|", $txt);


        self::assertMatchesRegularExpression("|<val>val1</val>|", $txt);
        self::assertMatchesRegularExpression("|<val>val2</val>|", $txt);
        self::assertMatchesRegularExpression("|<val>val3</val>|", $txt);

        $val = $this->capture(function() { Runner::run2(); });
        //print $val;

        self::assertMatchesRegularExpression("/key1/", $val);
        self::assertMatchesRegularExpression("/val1/", $val);

        self::assertMatchesRegularExpression("/key2/", $val);
        self::assertMatchesRegularExpression("/val2/", $val);

        self::assertMatchesRegularExpression("/key3/", $val);
        self::assertMatchesRegularExpression("/val3/", $val);
 
        $val = $this->capture(function() { Runner::run3(); });
        $paramsfile = __DIR__."/../../src/ch06/batch03/newparams.txt";
        $txt = file_get_contents($paramsfile);
        $contents = "key1:val1\nkey2:val2\nkey3:val3\nnewkey1:newval1\n";
        self::assertEquals($txt, $contents);



    }

    function testProductSwitcher()
    {
        $cd = new CdProduct("cdtitle", "first", "main", 99, 88);
        $book = new BookProduct("booktitle", "first", "main", 99, 200);
        $runner = new Runner();
        self::assertEquals("cd", $runner->workWithProducts($cd));
        self::assertEquals("book", $runner->workWithProducts($book));
    }
}

