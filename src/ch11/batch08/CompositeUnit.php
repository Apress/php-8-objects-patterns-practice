<?php

declare(strict_types=1);

namespace popp\ch11\batch08;

/* listing 11.42 */
abstract class CompositeUnit extends Unit
{
    // ...

/* /listing 11.42 */
    private array $units = [];

    public function getComposite(): Unit
    {
        return $this;
    }

    public function units(): array
    {
        return $this->units;
    }

    public function removeUnit(Unit $unit): void
    {
        $units = [];

        foreach ($this->units as $thisunit) {
            if ($unit !== $thisunit) {
                $units[] = $thisunit;
            }
        }

        $this->units = $units;
    }

    public function getHealth(): int
    {
        $health = 0;

        foreach ($this->units() as $unit) {
            $health += $unit->getHealth();
        }

        return $health;
    }

/* listing 11.42 */
    public function addUnit(Unit $unit): void
    {
        foreach ($this->units as $thisunit) {
            if ($unit === $thisunit) {
                return;
            }
        }

        $unit->setDepth($this->depth + 1);
        $this->units[] = $unit;
    }

    public function accept(ArmyVisitor $visitor): void
    {
        parent::accept($visitor);

        foreach ($this->units as $thisunit) {
            $thisunit->accept($visitor);
        }
    }
}
/* /listing 11.42 */
