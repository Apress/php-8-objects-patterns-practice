<?php

declare(strict_types=1);

namespace popp\ch04\batch06_5;

/* listing 04.38 */
class UtilityService extends Service
{
    use PriceUtilities;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as basicTax;
    }
}
