<?php

declare(strict_types=1);

namespace popp\ch04\batch20;

/* listing 04.99 */
class Person
{
    private int $id = 0;

    public function __construct(private string $name, private $age)
    {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function __clone(): void
    {
        $this->id = 0;
    }
/* /listing 04.99 */

    public function getId(): int
    {
        return $this->id;
    }
/* listing 04.99 */
}
/* /listing 04.99 */
