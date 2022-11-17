<?php

namespace App\Console\Commands;

use App\UseCases\CreateEmployeeUseCase;
use App\UseCases\DeleteEmployeeUseCase;

class PayRollCommand
{
    public static function addEmployee(
        int    $employeeId,
        string $name,
        string $address,
        string $salaryType,
        float  $salaryArg1,
        ?float $salaryArg2
    ): void
    {
        (new CreateEmployeeUseCase())->execute($employeeId, $name, $address, $salaryType, $salaryArg1, $salaryArg2);
    }

    public static function deleteEmployee(int $employeeId): void
    {
        (new DeleteEmployeeUseCase())->execute($employeeId);
    }
}

