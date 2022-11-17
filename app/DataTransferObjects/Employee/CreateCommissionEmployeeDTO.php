<?php

namespace App\DataTransferObjects\Employee;

class CreateCommissionEmployeeDTO extends AbstractCreateEmployeeDTO
{
    private int $monthlySalary;
    private float $commissionRate;

    public function getMonthlySalary(): int
    {
        return $this->monthlySalary;
    }

    public function setMonthlySalary(int $monthlySalary): self
    {
        $this->monthlySalary = $monthlySalary;
        return $this;
    }

    public function getCommissionRate(): float
    {
        return $this->commissionRate;
    }

    public function setCommissionRate(float $commissionRate): self
    {
        $this->commissionRate = $commissionRate;
        return $this;
    }
}
