<?php

declare(strict_types=1);

namespace popp\ch03\batch15;

/* listing 03.74 */
class ShopProduct
{
    private int|float $discount = 0;

    public function __construct(
        private string $title,
        private string $producerFirstName,
        private string $producerMainName,
        protected int|float $price
    ) {
    }

    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

/* listing 03.50 */
    public function setDiscount(int|float $num): void
    {
        $this->discount = $num;
    }
/* /listing 03.50 */

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

/* listing 03.49 */
    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }
/* /listing 03.49 */

    public function getProducer(): string
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function getSummaryLine(): string
    {
        $base  = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }
}
/* /listing 03.74 */
