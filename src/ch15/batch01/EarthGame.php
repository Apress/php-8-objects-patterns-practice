<?php

/* listing 15.05 */

namespace popp\ch15\batch01;

use popp\ch10\batch06\PollutionDecorator;
use popp\ch10\batch06\DiamondDecorator;
use popp\ch10\batch06\Plains;

// begin class
/* /listing 15.05 */
/* listing 15.07 */
class EarthGame extends Game implements Playable, Savable
{

// class body

/* /listing 15.07 */
/* listing 15.11 */
    public function __construct(
        int $size,
        string $name,
        bool $wraparound = false,
        bool $aliens = false
    ) {
        // implementation
    }
/* /listing 15.11 */
/* listing 15.10 */
    final public static function generateTile(int $diamondCount, bool $polluted = false): array
    {
        // implementation
/* /listing 15.10 */
/* listing 15.14 */
        $tile = [];
        for ($x = 0; $x < $diamondCount; $x++) {
            if ($polluted) {
                $tile[] = new PollutionDecorator(new DiamondDecorator(new Plains()));
            } else {
                $tile[] = new DiamondDecorator(new Plains());
            }
        }
/* /listing 15.14 */
        return $tile;
/* listing 15.10 */
    }
/* /listing 15.10 */

/* listing 15.12 */
    final public static function findTilesMatching(
        int $diamondCount,
        bool $polluted = false
    ): array {
        // implementation
    }
/* /listing 15.12 */

    public function getNonPlainsWithDiamondsAndPolution(): array
    {
/* listing 15.15 */
        $ret = [];
        for (
            $x = 0;
            $x < count($this->tiles);
            $x++
        ) {
            if (
                $this->tiles[$x]->isPolluted() &&
                $this->tiles[$x]->hasDiamonds() &&
                ! ($this->tiles[$x]->isPlains())
            ) {
                $ret[] = $x;
            }
        }
        return $ret;
/* /listing 15.15 */
    }
/* listing 15.07 */
}
/* /listing 15.07 */
