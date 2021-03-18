<?php
namespace popp\ch06\batch01;

class ShopProduct
{

    public string $type="book";

    public function __construct(
        public string $title,
        public string $producerFirstName,
        public string $producerMainName,
        public float  $price,
        public int    $numPages = 0,
        public int    $playLength = 0
    ) {

    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    public function getProducer(): string
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function setType(string $type): void
    {
        $this->type=$type;
    }

/* listing 06.09 */
    public function getSummaryLine(): string
    {
        $base  = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        if ($this->type == 'book') {
            $base .= ": page count - {$this->numPages}";
        } elseif ($this->type == 'cd') {
            $base .= ": playing time - {$this->playLength}";
        }
        return $base;
    }
/* /listing 06.09 */
}
