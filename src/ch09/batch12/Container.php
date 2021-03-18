<?php

declare(strict_types=1);

namespace popp\ch09\batch12;

/* listing 09.47 */
class Container
{
    public Contained $contained;

    public function __construct()
    {
        $this->contained = new Contained();
    }

    public function __clone()
    {
        // Ensure that cloned object holds a
        // clone of self::$contained and not
        // a reference to it

        $this->contained = clone $this->contained;
    }
}
