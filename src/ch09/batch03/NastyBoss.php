<?php

declare(strict_types=1);

namespace popp\ch09\batch03;

class NastyBoss
{
    private array $employees = array();

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
