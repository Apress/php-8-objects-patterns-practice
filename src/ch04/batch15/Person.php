<?php

declare(strict_types=1);

namespace popp\ch04\batch15;

/* listing 04.81 */
class Person
{
    public function __get(string $property): mixed
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

/* /listing 04.81 */
/* listing 04.83 */
    public function __isset(string $property): bool
    {
        $method = "get{$property}";
        return (method_exists($this, $method));
    }
/* /listing 04.83 */
/* listing 04.81 */
    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }
}
/* /listing 04.81 */
