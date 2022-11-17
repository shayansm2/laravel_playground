<?php

namespace App\Repositories;

use App\DataTransferObjects\AbstractCreateEmployeeDTO;
use App\DataTransferObjects\CreateCommissionEmployeeDTO;
use App\DataTransferObjects\CreateHourlyEmployeeDTO;
use App\DataTransferObjects\CreateSalaryEmployeeDTO;
use App\Models\Employee;

class EmployeeRepository
{
    public static function createHourly(CreateHourlyEmployeeDTO $dto): void
    {
        $data = array_merge(
            self::getBaseData($dto),
            ['hourly_rate' => $dto->getHourlyRate()]
        );

        Employee::create($data);
    }

    public static function createSalaryBased(CreateSalaryEmployeeDTO $dto): void
    {
        $data = array_merge(
            self::getBaseData($dto),
            ['monthly_salary' => $dto->getMonthlySalary()]
        );

        Employee::create($data);
    }

    public static function createCommissionBased(CreateCommissionEmployeeDTO $dto): void
    {
        $data = array_merge(
            self::getBaseData($dto),
            [
                'monthly_salary' => $dto->getMonthlySalary(),
                'commission_rate' => $dto->getCommissionRate(),
            ]
        );

        Employee::create($data);
    }

    private static function getBaseData(AbstractCreateEmployeeDTO $dto): array
    {
        return [
            'id' => $dto->getId(),
            'name' => $dto->getName(),
            'address' => $dto->getAddress(),
            'salary_type' => $dto->getSalaryType(),
        ];
    }

    public static function delete(int $id): void
    {
        Employee::destroy($id);
    }
}
