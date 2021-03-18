<?php
declare(strict_types=1);

namespace popp\ch04\batch05;

use popp\ch04\batch02\CdProduct;
use popp\ch04\batch05\ShopProduct as LocalShopProduct;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch05Test extends BaseUnit 
{

    public function testPrice()
    {
        $price = Runner::run();
        self::assertEquals($price, "12.22");
    } 

    function testCdInfo() {
        $product =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60
        );
        $runner = new Runner();
        $len = $runner->cdInfo($product);
        self::assertEquals(60, $len);
    }

    function testAddProduct() {
        $product =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60
        );
        $runner = new Runner();
        $sum = $runner->addProduct($product);
        self::assertEquals("Exile on Coldharbour Lane ( Alabama 3, The ): playing time - 60", $sum);
    }

    function testAddChargeable() {
        $item =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60
        );
        $item = new LocalShopProduct(10.99);
        $runner = new Runner();
        $price = $runner->addChargeableItem($item);
        self::assertEquals(10.99, $price);
    }

    function testShipping() {
        $shipping = new Shipping(20.20);
        $price = $shipping->getPrice();
        self::assertEquals(20.20, $price);
    }

    function testConsultancy()
    {
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals(5.5, $val);
    }

    public function testDocumentAndUser()
    {
        $document = Document::create();
        self::assertTrue($document instanceof Document);
        $user = User::create();
        self::assertTrue($user instanceof User);
    }

}
