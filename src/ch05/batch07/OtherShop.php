<?php

declare(strict_types=1);

namespace popp\ch05\batch07;

class OtherShop
{
    public function thing(): void
    {
        print "thing\n";
    }

    public function andAnotherthing(string $a, string $b): void
    {
        print "another thing ($a, $b)\n";
    }
}
