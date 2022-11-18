<?php

namespace App\UseCases;

use App\DataTransferObjects\CreateSalesReceiptDTO;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use App\Repositories\SalesReceiptRepository;
use Assert\Assert;
use Carbon\Carbon;

class PostSalesReceiptUseCase
{
    private SalesReceiptRepository $salesReceiptRepository;
    private EmployeeRepository $employeeRepository;

    public function __construct()
    {
        $this->salesReceiptRepository = new SalesReceiptRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function execute(int $employeeId, string $date, int $amount): void
    {
        $employee = $this->employeeRepository::findOrFail($employeeId);

        // todo remove dependency to App\Models\Employee
        Assert::that($employee->getSalaryType())->eq(Employee::SALARY_TYPE_COMMISSION_SALARY);

        $dto = (new CreateSalesReceiptDTO())
            ->setEmployeeId($employeeId)
            ->setDate(Carbon::parse($date))
            ->setAmount($amount);

        $this->salesReceiptRepository::create($dto);
    }
}
