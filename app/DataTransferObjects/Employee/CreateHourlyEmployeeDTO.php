<?php

namespace App\DataTransferObjects\Employee;

class CreateHourlyEmployeeDTO extends AbstractCreateEmployeeDTO
{
    private float $hourlyRate;

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate): self
    {
        $this->hourlyRate = $hourlyRate;
        return $this;
    }
}
