<?php

declare(strict_types=1);

namespace popp\ch04\batch08;

/* listing 04.114 */
class Mailer
{
    public function doMail(Product $product): void
    {
        print "    mailing ({$product->name})\n";
    }
}
