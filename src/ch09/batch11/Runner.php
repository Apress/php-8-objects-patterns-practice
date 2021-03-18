<?php

declare(strict_types=1);

namespace popp\ch09\batch11;

class Runner
{
    public static function run()
    {
/* listing 09.42 */
/* listing 09.51 */
        $factory = new TerrainFactory(
            new EarthSea(),
            new EarthPlains(),
            new EarthForest()
        );
/* /listing 09.51 */
        print_r($factory->getSea());
        print_r($factory->getPlains());
        print_r($factory->getForest());
/* /listing 09.42 */
    }

    public static function run2()
    {
/* listing 09.43 */
        $factory = new TerrainFactory(
            new EarthSea(),
            new MarsPlains(),
            new EarthForest()
        );
/* /listing 09.43 */

        print_r($factory->getSea());
        print_r($factory->getPlains());
        print_r($factory->getForest());
    }
}
