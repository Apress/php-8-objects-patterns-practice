<?php

declare(strict_types=1);

namespace popp\ch03\batch15;

/* listing 03.47 */

class Storage
{
    public function add(string $key, ?string $value)
    {
        // do something with $key and $value
/* /listing 03.47 */
        return [$key, $value];
/* listing 03.47 */
    }
}
/* /listing 03.47 */
