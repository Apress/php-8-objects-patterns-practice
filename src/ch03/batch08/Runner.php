<?php

namespace popp\ch03\batch08;

use popp\ch03\batch04\ShopProduct;
use popp\ch03\batch08\ShopProductWriter;
use popp\ch03\batch08\Wrong;

class Runner
{
    public static function run1()
    {
/* listing 03.32 */
        $writer = new ShopProductWriter();
        $writer->write(new Wrong());
/* /listing 03.32 */
    }
}
