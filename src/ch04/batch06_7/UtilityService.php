<?php

declare(strict_types=1);

namespace popp\ch04\batch06_7;

/* listing 04.44 */
class UtilityService extends Service
{
    use PriceUtilities;

    public $taxrate = 20;
}
