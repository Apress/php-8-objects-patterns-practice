<?php

declare(strict_types=1);

namespace popp\ch04\batch18;

/* listing 04.89 */
class Person
{

    public function __construct(private PersonWriter $writer)
    {
    }

    public function __call(string $method, array $args): mixed
    {
        if (method_exists($this->writer, $method)) {
            return $this->writer->$method($this);
        }
    }

    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }
}
