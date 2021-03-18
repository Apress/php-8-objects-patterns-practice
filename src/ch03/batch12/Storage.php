<?php

declare(strict_types=1);

namespace popp\ch03\batch12;

/* listing 03.42 */

class Storage
{
    public function add(string $key, $value)
    {
        if (! is_bool($value) && ! is_string($value)) {
            error_log("value must be string or Boolean - given: " . gettype($value));
            return false;
        }
        // do something with $key and $value
/* /listing 03.42 */
        return [$key, $value];
/* listing 03.42 */
    }
}
/* /listing 03.42 */
