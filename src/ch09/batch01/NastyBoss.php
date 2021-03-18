<?php

declare(strict_types=1);

namespace popp\ch09\batch01;

/* listing 09.03 */
class NastyBoss
{
    private array $employees = [];

    public function addEmployee(string $employeeName): void
    {
        $this->employees[] = new Minion($employeeName);
    }

    public function projectFails(): void
    {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
