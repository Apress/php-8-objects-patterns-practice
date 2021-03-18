<?php

declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.76 */
class Person
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
/* /listing 05.76 */
