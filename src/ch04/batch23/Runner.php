<?php

declare(strict_types=1);

namespace popp\ch04\batch23;

class Runner
{
    public static function run()
    {
/* suspended_listing 04.90 */
        $logger = create_function(
            '$product',
            'print "    logging ({$product->name})\n";'
        );

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /spendedlisting 04.90 */
    }

    public static function run2()
    {
/* listing 04.112 */
        $logger = function ($product) {
            print "    logging ({$product->name})\n";
        };

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.112 */
    }
    public static function run3()
    {
/* listing 04.113 */

        $logger = fn($product) => print "    logging ({$product->name})\n";
/* /listing 04.113 */

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
    }
}
//done
