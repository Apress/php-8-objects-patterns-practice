<?php

declare(strict_types=1);

namespace popp\ch13\batch06;

/* suspended-listing 13.36 */
class EventIdentityObject extends IdentityObject
{
    private ?int $start = null;
    private ?int $minstart = null;

    public function setMinimumStart(int $minstart): void
    {
        $this->minstart = $minstart;
    }

    public function getMinimumStart(): int
    {
        return $this->minstart;
    }

    public function setStart(int $start): void
    {
        $this->start = $start;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }
}
/* /suspended-listing 13.36 */
