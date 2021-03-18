<?php

declare(strict_types=1);

namespace popp\ch09\batch11;

/* listing 09.41 */
class TerrainFactory
{
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    public function getSea(): Sea
    {
        return clone $this->sea;
    }

    public function getPlains(): Plains
    {
        return clone $this->plains;
    }

    public function getForest(): Forest
    {
        return clone $this->forest;
    }
}
