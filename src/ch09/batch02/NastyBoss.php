<?php

declare(strict_types=1);

namespace popp\ch09\batch02;

/* listing 09.05 */
class NastyBoss
{
    private array $employees = [];

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function projectFails(): void
    {
        if (count($this->employees)) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}
