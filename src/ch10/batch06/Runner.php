<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

class Runner
{
    public static function run()
    {
/* listing 10.21 */
        $tile = new PollutedPlains();
        print $tile->getWealthFactor();
/* /listing 10.21 */
    }

    public static function run2()
    {
/* listing 10.27 */
        $tile = new Plains();
        print $tile->getWealthFactor(); // 2
/* /listing 10.27 */
    }

    public static function run3()
    {
/* listing 10.28 */
        $tile = new DiamondDecorator(new Plains());
        print $tile->getWealthFactor(); // 4
/* /listing 10.28 */
    }

    public static function run4()
    {
/* listing 10.29 */
        $tile = new PollutionDecorator(new DiamondDecorator(new Plains()));
        print $tile->getWealthFactor(); // 0
/* /listing 10.29 */
    }
}
