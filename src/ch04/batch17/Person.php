<?php

declare(strict_types=1);

namespace popp\ch04\batch17;

/* listing 04.85 */
class Person
{
    private ?string $myname;
    private ?int $myage;

    public function __set(string $property, mixed $value): void
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }
/* /listing 04.85 */
/* listing 04.87 */
    public function __unset(string $property): void
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
    }
/* /listing 04.87 */
/* listing 04.85 */

    public function setName(?string $name): void
    {
        $this->myname = $name;
        if (! is_null($name)) {
            $this->myname = strtoupper($this->myname);
        }
    }

    public function setAge(?int $age): void
    {
        $this->myage = $age;
    }
/* /listing 04.85 */
    public function getName(): string
    {
        return $this->myname;
    }
/* listing 04.85 */
}
/* /listing 04.85 */
