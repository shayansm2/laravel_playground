<?php

namespace App\DataTransferObjects\Employee;

class CreateSalaryEmployeeDTO extends AbstractCreateEmployeeDTO
{
    private int $monthlySalary;

    public function getMonthlySalary(): int
    {
        return $this->monthlySalary;
    }

    public function setMonthlySalary(int $monthlySalary): self
    {
        $this->monthlySalary = $monthlySalary;
        return $this;
    }
}
