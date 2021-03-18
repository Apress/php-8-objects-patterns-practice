<?php

declare(strict_types=1);

namespace popp\ch03\batch14;

use popp\ch03\batch14\ShopProduct;

class BookProduct extends ShopProduct
{
    public int $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->numPages = $numPages;
    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

/* listing 03.65 */
// BookProduct

    public function getSummaryLine(): string
    {
        $base  = parent::getSummaryLine();
        $base .= ": page count - $this->numPages";
        return $base;
    }
/* /listing 03.65 */
/* listing 03.68 */
// BookProduct

    public function getPrice(): int|float
    {
        return $this->price;
    }
/* /listing 03.68 */
}
