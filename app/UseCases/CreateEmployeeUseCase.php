<?php

namespace App\UseCases;

use App\DataTransferObjects\CreateEmployeeDTO;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Assert\Assert;

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
        $dto = (new CreateEmployeeDTO())
            ->setId($id)
            ->setName($name)
            ->setAddress($address)
            ->setSalaryType($salaryType);

        switch ($salaryType) {
            case Employee::SALARY_TYPE_HOURLY_RATE:
                $dto->setHourlyRate($salaryArg1);
                break;
            case Employee::SALARY_TYPE_MONTHLY_SALARY:
                $dto->setMonthlySalary($salaryArg1);
                break;
            case Employee::SALARY_TYPE_COMMISSION_SALARY:
                $dto->setMonthlySalary($salaryArg1)
                    ->setCommissionRate($salaryArg2);
                break;
            default:
                Assert::that(true)->false('invalid salary type');
        }

        $this->repository::create($dto);
    }
}
