<?php

declare(strict_types=1);

namespace popp\ch03\batch13;

/* listing 03.43 */

class Storage
{
    public function add(string $key, string|bool $value)
    {
        // do something with $key and $value
/* /listing 03.43 */
        return [$key, $value];
/* listing 03.43 */
    }
}
/* /listing 03.43 */
