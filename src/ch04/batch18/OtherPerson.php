<?php

declare(strict_types=1);

namespace popp\ch04\batch18;

class OtherPerson extends Person
{

    public function __construct(private PersonWriter $writer)
    {
    }

    public function __call(string $method, array $args): mixed
    {
        // turn this off
    }

/* listing 04.91 */
    public function writeName(): void
    {
        $this->writer->writeName($this);
    }
/* /listing 04.91 */

    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }
}
