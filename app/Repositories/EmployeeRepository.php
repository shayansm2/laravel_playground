<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateEmployeeDTO;
use App\Models\Employee;

class EmployeeRepository
{
    public static function create(CreateEmployeeDTO $dto): void
    {
        Employee::create([
            'id' => $dto->getId(),
            'name' => $dto->getName(),
            'address' => $dto->getAddress(),
            'salary_type' => $dto->getSalaryType(),
            'monthly_salary' => $dto->getMonthlySalary(),
            'commission_rate' => $dto->getCommissionRate(),
            'hourly_rate' => $dto->getHourlyRate(),
        ]);
    }

    public static function delete(int $id): void
    {
        Employee::destroy($id);
    }

    public function findOrFail(int $id): Employee
    {
        $employee = Employee::findOrFail($id);
        /** @var Employee $employee */
        return $employee;
    }
}
