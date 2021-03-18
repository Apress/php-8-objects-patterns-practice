<?php

declare(strict_types=1);

namespace popp\ch09\batch03;

use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class ShopProduct
{
    public const AVAILABLE      = 0;
    public const OUT_OF_STOCK   = 1;
    public mixed $status;

    private int $discount = 0;
    private int $id = 0;

    public function __construct(
        private string $title,
        private string $producerFirstName,
        private string $producerMainName,
        protected float|int $price
    ) {
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

    public function setDiscount(int $num): void
    {
        $this->discount = $num;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return ($this->price - $this->discount);
    }

    public function getProducer(): string
    {
        return "{$this->producerFirstName}" .
               " {$this->producerMainName}";
    }

    public function getSummaryLine(): string
    {
        $base  = "$this->title ( $this->producerMainName, ";
        $base .= "$this->producerFirstName )";
        return $base;
    }

/* listing 09.11 */
    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (empty($row)) {
            return null;
        }
/* /listing 09.11 */
        $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
        $product = new ShopProduct(
            $row['title'],
            $firstname,
            $row['mainname'],
            (float) $row['price']
        );
/* listing 09.11 */
        if ($row['type'] == "book") {
            // instantiate a BookProduct object
        } elseif ($row['type'] == "cd") {
            // instantiate a CdProduct object
        } else {
            // instantiate a ShopProduct object
        }

        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;
    }
/* /listing 09.11 */
}
