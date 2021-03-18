<?php

declare(strict_types=1);

namespace popp\ch04\batch08;

class Runner
{
    public static function run()
    {
        $logger = create_function(
            '$product',
            'print "    logging ({$product->name})\n";'
        );

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
    }

    public static function run2()
    {
        $logger2 = function ($product) {
            print "    logging ({$product->name})\n";
        };

        $processor = new ProcessSale();
        $processor->registerCallback($logger2);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
    }

    public static function run3()
    {
/* listing 04.115 */
        $processor = new ProcessSale();
        $processor->registerCallback([new Mailer(), "doMail"]);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.115 */
    }

    public static function run4()
    {
/* listing 04.117 */
        $processor = new ProcessSale();
        $processor->registerCallback(Totalizer::warnAmount());

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.117 */
    }

    public static function run5()
    {
/* listing 04.119 */
        $processor = new ProcessSale();
        $processor->registerCallback(Totalizer2::warnAmount(8));

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.119 */
    }

    public static function run6()
    {
/* listing 04.122 */
        $totalizer3 = new Totalizer3();
        $processor = new ProcessSale();
        $processor->registerCallback($totalizer3->warnAmount(8));

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.122 */
    }

    public static function run7()
    {
/* listing 04.120 */
        $markup = 3;
        $counter = fn(Product $product) => print "($product->name) marked up price: " .
                   ($product->price + $markup) . "\n";
        $processor = new ProcessSale();
        $processor->registerCallback($counter);

        $processor->sale(new Product("shoes", 6));

        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.120 */
    }
}
