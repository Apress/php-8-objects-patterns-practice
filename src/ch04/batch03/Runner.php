<?php

declare(strict_types=1);

namespace popp\ch04\batch03;

use popp\ch04\batch02\ShopProduct;
use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{


    public static function run2()
    {
        // demonstrate abstract instantiation error
/* listing 04.10 */
        $writer = new ShopProductWriter();
/* /listing 04.10 */
    }

    private static function getProducts(): array
    {
        $product1 = new BookProduct("My Antonia", "Willa", "Cather", 5.99, 300);
        $product2 =   new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60
        );
        return [$product1, $product2];
    }

    public static function run3()
    {
        list($product1, $product2) = self::getProducts();
        $textwriter = new TextProductWriter();
        $textwriter->addProduct($product1);
        $textwriter->addProduct($product2);
        $textwriter->write();
    }

    public static function run4()
    {
        list($product1, $product2) = self::getProducts();
        $xmlwriter = new XmlProductWriter();
        $xmlwriter->addProduct($product1);
        $xmlwriter->addProduct($product2);
        $xmlwriter->write();
    }
}
