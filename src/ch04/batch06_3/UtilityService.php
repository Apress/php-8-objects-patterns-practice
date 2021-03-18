<?php

declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* suspended_listing 04.27 */
class UtilityService extends Service
{
    use PriceUtilities;
    use TaxTools;
}
