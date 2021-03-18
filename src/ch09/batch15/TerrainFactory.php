<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

use popp\ch09\batch11\Sea;
use popp\ch09\batch11\Plains;
use popp\ch09\batch11\Forest;

/* listing 09.63 */
class TerrainFactory
{
    #[InjectConstructor(Sea::class, Plains::class, Forest::class)]
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
