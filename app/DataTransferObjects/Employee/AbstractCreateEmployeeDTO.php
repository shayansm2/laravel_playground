<?php

namespace App\DataTransferObjects\Employee;

Abstract class AbstractCreateEmployeeDTO
{
    private int $id;
    private string $name;
    private string $address;
    private string $salaryType;

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
}
