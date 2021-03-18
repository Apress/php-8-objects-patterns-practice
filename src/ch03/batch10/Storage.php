<?php

declare(strict_types=1);

namespace popp\ch03\batch10;

/* listing 03.40 */

class Storage
{
    public function add(string $key, $value)
    {
        // do something with $key and $value
/* /listing 03.40 */
        return [$key, $value];
/* listing 03.40 */
    }
}
/* /listing 03.40 */
