<?php

declare(strict_types=1);

namespace popp\ch09\batch12;

class TerrainFactory
{
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }

    public function getSea()
    {
        return clone $this->sea;
    }

    public function getPlains()
    {
        return clone $this->plains;
    }

    public function getForest()
    {
        return clone $this->forest;
    }
}
