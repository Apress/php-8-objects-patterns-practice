<?php

declare(strict_types=1);

namespace popp\ch15\batch01;

class Runner
{
    public static function run()
    {
/* listing 15.13 */
        $earthgame = new EarthGame(
            5,
            "earth",
            true,
            true
        );
        $earthgame::generateTile(5, true);
/* /listing 15.13 */
    }

    public static function index()
    {
        require_once(__DIR__ . "/index.php");
    }
}

namespace popp\ch15\batch01\other;

use popp\ch15\batch01\Game;
use popp\ch15\batch01\Playable;
use popp\ch15\batch01\Savable;

/* listing 15.06 */
class EarthGame extends Game implements
    Playable,
    Savable
{

    // class body
}
/* /listing 15.06 */
