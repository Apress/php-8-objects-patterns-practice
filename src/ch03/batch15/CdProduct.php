<?php

declare(strict_types=1);

namespace popp\ch03\batch15;

use popp\ch03\batch15\ShopProduct;

/* listing 03.75 */
class CdProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        private int $playLength
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
    }

/* listing 03.48 */
    public function getPlayLength(): int
    {
        return $this->playLength;
    }
/* /listing 03.48 */

    public function getSummaryLine(): string
    {
        $base  = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}
/* /listing 03.75 */
