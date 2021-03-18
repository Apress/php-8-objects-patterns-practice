<?php

declare(strict_types=1);

namespace popp\ch03\batch11;

/* listing 03.41 */

class Storage
{
    public function add(string $key, mixed $value)
    {
        // do something with $key and $value
/* /listing 03.41 */
        return [$key, $value];
/* listing 03.41 */
    }
}
/* /listing 03.41 */
