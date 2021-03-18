<?php

declare(strict_types=1);

namespace popp\ch11\batch07;

/* listing 11.39 */
abstract class Unit
{
    // ...

/* /listing 11.39 */
    public function getComposite(): Unit
    {
        return null;
    }

    abstract public function bombardStrength(): int;

/* listing 11.39 */
    public function textDump($num = 0): string
    {
        $txtout = "";
        $pad = 4 * $num;
        $txtout .= sprintf("%{$pad}s", "");
        $txtout .= get_class($this) . ": ";
        $txtout .= "bombard: " . $this->bombardStrength() . "\n";

        return $txtout;
    }
    // ...

/* /listing 11.39 */

    public function unitCount(): int
    {
        return 1;
    }
/* listing 11.39 */
}
/* /listing 11.39 */
