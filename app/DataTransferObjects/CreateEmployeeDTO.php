<?php

namespace App\DataTransferObjects;

class CreateEmployeeDTO
{
    private int $id;
    private string $name;
    private string $address;
    private string $salaryType;

    private ?int $monthlySalary = null;
    private ?float $commissionRate = null;
    private ?float $hourlyRate = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getSalaryType(): string
    {
        return $this->salaryType;
    }

    public function setSalaryType(string $salaryType): self
    {
        $this->salaryType = $salaryType;
        return $this;
    }

    public function getMonthlySalary(): ?int
    {
        return $this->monthlySalary;
    }

    public function setMonthlySalary(int $monthlySalary): self
    {
        $this->monthlySalary = $monthlySalary;
        return $this;
    }

    public function getCommissionRate(): ?float
    {
        return $this->commissionRate;
    }

    public function setCommissionRate(float $commissionRate): self
    {
        $this->commissionRate = $commissionRate;
        return $this;
    }

    public function getHourlyRate(): ?float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate): self
    {
        $this->hourlyRate = $hourlyRate;
        return $this;
    }
}
