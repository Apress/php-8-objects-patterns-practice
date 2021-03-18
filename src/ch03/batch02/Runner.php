<?php

namespace popp\ch03\batch02;

use popp\ch03\batch02\ShopProduct;

class Runner
{
    public static function run1()
    {
/* listing 03.05 */
        $product1 = new ShopProduct();
        print $product1->title;
/* /listing 03.05 */
    }

    public static function run2()
    {
/* listing 03.06 */
        $product1 = new ShopProduct();
        $product2 = new ShopProduct();
        $product1->title = "My Antonia";
        $product2->title = "Catch 22";
/* /listing 03.06 */

        print $product1->title . "\n";
        print $product2->title . "\n";
    }

    public static function run3()
    {
        $product1 = new ShopProduct();
/* listing 03.07 */
        $product1->arbitraryAddition = "treehouse";
/* /listing 03.07 */

        print $product1->arbitraryAddition . "\n";
    }

    public static function run4()
    {
/* listing 03.08 */
        $product1 = new ShopProduct();
        $product1->title = "My Antonia";
        $product1->producerMainName  = "Cather";
        $product1->producerFirstName = "Willa";
        $product1->price = 5.99;
/* /listing 03.08 */

/* listing 03.09 */
        print "author: {$product1->producerFirstName} "
            . "{$product1->producerMainName}\n";
/* /listing 03.09 */
    }

    public static function run5()
    {
        $product1 = new ShopProduct();
/* listing 03.10 */
        $product1->producerFirstName = "Shirley";
        $product1->producerMainName = "Jackson";
/* /listing 03.10 */
        print "author: {$product1->producerFirstName} "
            . "{$product1->producerMainName}\n";
        //print_r($product1);
    }

    public static function run6()
    {
        $product1 = new ShopProduct();
/* listing 03.11 */
        $product1->producerFirstName = "Shirley";
        $product1->producerSecondName = "Jackson";
/* /listing 03.11 */
        print "author: {$product1->producerFirstName} "
            . "{$product1->producerMainName}\n";
    }
}
