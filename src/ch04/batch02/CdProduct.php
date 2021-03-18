<?php

declare(strict_types=1);

namespace popp\ch04\batch02;

class CdProduct extends ShopProduct
{
    private int $playLength = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->playLength = $playLength;
    }

    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": playing time - $this->playLength";
        return $base;
    }

    public function mytest(): string|int
    {
        return "it was a string";
    }

    public function other(): ?string
    {
        return null;
        // nothing
    }

    public function writeInfo(string $header, string $desc): void
    {

    }
}
