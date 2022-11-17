<?php

namespace App\UseCases;

use App\DataTransferObjects\Employee\CreateCommissionEmployeeDTO;
use App\DataTransferObjects\Employee\CreateHourlyEmployeeDTO;
use App\DataTransferObjects\Employee\CreateSalaryEmployeeDTO;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;

class CreateEmployeeUseCase
{
    private EmployeeRepository $repository;

    public function __construct()
    {
        $this->repository = (new EmployeeRepository());
    }

    public function execute(
        int    $id,
        string $name,
        string $address,
        string $salaryType,
        float  $salaryArg1,
        ?float $salaryArg2
    ): void
    {
        switch ($salaryType) {
            case Employee::SALARY_TYPE_HOURLY_RATE:
                $this->createHourlyEmployee($id, $name, $address, $salaryArg1);
                break;
            case Employee::SALARY_TYPE_MONTHLY_SALARY:
                $this->createSalaryEmployee($id, $name, $address, $salaryArg1);
                break;
            case Employee::SALARY_TYPE_COMMISSION_SALARY:
                $this->createCommissionEmployee($id, $name, $address, $salaryArg1, $salaryArg2);
                break;
        }
    }

    private function createHourlyEmployee(int $id, string $name, string $address, float $hourlyRate): void
    {
        $dto = (new CreateHourlyEmployeeDTO())
            ->setId($id)
            ->setName($name)
            ->setAddress($address)
            ->setHourlyRate($hourlyRate)
            ->setSalaryType(Employee::SALARY_TYPE_HOURLY_RATE);

        $this->repository::createHourly($dto);
    }

    private function createSalaryEmployee(int $id, string $name, string $address, int $monthlySalary): void
    {
        $dto = (new CreateSalaryEmployeeDTO())
            ->setId($id)
            ->setName($name)
            ->setAddress($address)
            ->setMonthlySalary($monthlySalary)
            ->setSalaryType(Employee::SALARY_TYPE_MONTHLY_SALARY);

        $this->repository::createSalaryBased($dto);
    }

    private function createCommissionEmployee(int $id, string $name, string $address, int $monthlySalary, float $commissionRate): void
    {
        $dto = (new CreateCommissionEmployeeDTO())
            ->setId($id)
            ->setName($name)
            ->setAddress($address)
            ->setMonthlySalary($monthlySalary)
            ->setCommissionRate($commissionRate)
            ->setSalaryType(Employee::SALARY_TYPE_COMMISSION_SALARY);

        $this->repository::createCommissionBased($dto);
    }
}
