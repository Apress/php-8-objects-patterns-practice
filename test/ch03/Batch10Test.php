<?php

namespace popp\ch03;

require_once("vendor/autoload.php");
use PHPUnit\Framework\TestCase;

use popp\ch03\batch10\ConfReader;
use popp\ch03\batch10\Runner;
use popp\ch03\batch10\Storage;
use popp\ch03\batch10\Point;

class Batch10Test extends TestCase
{
    public function testAddressManager()
    {
        try {
            Runner::run1();
            self::fail("Exception should have been thrown");
        } catch (\TypeError $e) {
        }
        self::assertTrue(true);
    }

    public function testStorage()
    {
        $s = new Storage();
        list($key, $value) = $s->add("key", "value");
        self::assertEquals($key, "key");
        self::assertEquals($value, "value");
    }

    public function testOptionalValue()
    {
        $reader = new ConfReader();
        $values = $reader->getValues(["name"=>"harry", "color"=>"blue"]);
        self::assertTrue(isset($values['name']) && $values['name'] == "mary");
        self::assertTrue(isset($values['color']) && $values['color'] == "blue");

        // now with no value passed in
        $reader = new ConfReader();
        $values = $reader->getValues();
        self::assertTrue(isset($values['name']) && $values['name'] == "mary");
    }

    public function testShopProduct() {
        ob_start();
        Runner::run2();
        $output = ob_get_contents();
        ob_end_clean();
        self::assertEquals("author: Willa Cather\nartist: The Alabama 3\n", $output);
    }

    public function testPoint() {
        $point = new Point();
        $point->setVals(1,2);
        self::assertEquals(1, $point->getX());
        self::assertEquals(2, $point->getY());
    }
}
