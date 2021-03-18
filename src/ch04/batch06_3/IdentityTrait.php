<?php

declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* suspended_listing 04.21 */
trait IdentityTrait
{
    public function generateId(): string
    {
        return uniqid();
    }
}
