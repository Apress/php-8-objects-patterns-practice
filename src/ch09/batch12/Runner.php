<?php

declare(strict_types=1);

namespace popp\ch09\batch12;

class Runner
{
    public static function run()
    {
/* listing 09.45 */
        $factory = new TerrainFactory(
            new EarthSea(-1),
            new EarthPlains(),
            new EarthForest()
        );
/* /listing 09.45 */
        print_r($factory->getSea());
        print_r($factory->getPlains());
        print_r($factory->getForest());
    }
}
