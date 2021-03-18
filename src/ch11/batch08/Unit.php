<?php

declare(strict_types=1);

namespace popp\ch11\batch08;

/* listing 11.41 */
abstract class Unit
{
    // ...
/* /listing 11.41 */
    protected int $health = 10;
    protected int $depth = 0;

    public function getComposite(): ?Unit
    {
        return null;
    }

    abstract public function bombardStrength(): int;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function isNull(): bool
    {
        return false;
    }
/* listing 11.41 */
    public function accept(ArmyVisitor $visitor): void
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = "visit" . $refthis->getShortName();
        $visitor->$method($this);
    }

    protected function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}
/* /listing 11.41 */
