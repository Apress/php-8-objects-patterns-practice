<?php

namespace popp\ch03\batch09;

/* listing 03.33 */
class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    // ...
/* /listing 03.33 */
    public function getProducer()
    {
        return "{$this->producerFirstName}" .
               " {$this->producerMainName}";
    }

    public function getPrice()
    {
        return $this->price;
    }
/* listing 03.33 */
}
/* /listing 03.33 */
