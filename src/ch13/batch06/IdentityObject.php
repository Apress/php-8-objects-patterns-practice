<?php

declare(strict_types=1);

namespace popp\ch13\batch06;

/* listing 13.37 */
abstract class IdentityObject
{
    private ?string $name = null;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
/* /listing 13.37 */
