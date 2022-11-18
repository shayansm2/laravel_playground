<?php

namespace Feature;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PayrollTest extends TestCase
{
    use RefreshDatabase;

    public function testAddSalariedEmployee(): void
    {
        $empId = 1;
        $name = 'shayan';
        $address = 'Home';
        $salary = 1000.00;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} S {$salary}")
            ->assertExitCode(0);

        $this->assertDatabaseHas('employees', [
            'name' => $name,
            'salary_type' => Employee::SALARY_TYPE_MONTHLY_SALARY,
            'monthly_salary' => $salary,
        ]);
    }

    public function testAddHourlyEmployee(): void
    {
        $empId = 1;
        $name = 'shayan';
        $address = 'Home';
        $hourlyRate = 1.0;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} H {$hourlyRate}")
            ->assertSuccessful();

        $this->assertDatabaseHas('employees', [
            'id' => $empId,
            'salary_type' => Employee::SALARY_TYPE_HOURLY_RATE,
            'hourly_rate' => $hourlyRate,
        ]);
    }

    public function testAddCommissionedEmployee(): void
    {
        $empId = 1;
        $name = 'shayan';
        $address = 'Home';
        $salary = 1000.00;
        $commissionRate = 0.1;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} C {$salary} {$commissionRate}")
            ->assertExitCode(0);

        $this->assertDatabaseHas('employees', [
            'id' => $empId,
            'salary_type' => Employee::SALARY_TYPE_COMMISSION_SALARY,
            'monthly_salary' => $salary,
            'commission_rate' => $commissionRate,
        ]);
    }

    public function testDeleteEmployee(): void
    {
        $empId = 3;
        $name = 'shayan';
        $address = 'Home';
        $salary = 1000.00;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} S {$salary}")
            ->assertExitCode(0);

        $this
            ->artisan("DelEmp {$empId}")
            ->assertSuccessful();

        $this->assertDatabaseMissing('employees', [
            'id' => $name
        ]);
    }

    public function testTimeCardTransaction(): void
    {
        $empId = 3;
        $name = 'shayan';
        $address = 'Home';
        $hourlyRate = 1.0;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} H {$hourlyRate}")
            ->assertSuccessful();

        $postingDate = Carbon::now()->format('Y-m-d');
        $hours = 8;

        $this
            ->artisan("TimeCard {$empId} {$postingDate} {$hours}")
            ->assertSuccessful();

        $this->assertDatabaseHas('time_cards', [
            'employee_id' => $empId,
            'hours' => $hours,
            'date' => $postingDate,
        ]);
    }

    public function testSalesReceiptTransaction(): void
    {
        $empId = 3;
        $name = 'shayan';
        $address = 'Home';
        $salary = 1000.00;
        $commissionRate = 0.1;

        $this
            ->artisan("AddEmp {$empId} {$name} {$address} C {$salary} {$commissionRate}")
            ->assertExitCode(0);

        $postingDate = Carbon::now()->format('Y-m-d');
        $amount = 79000.00;

        $this
            ->artisan("SalesReceipt {$empId} {$postingDate} {$amount}")
            ->assertSuccessful();

        $this->assertDatabaseHas('sales_receipts', [
            'employee_id' => $empId,
            'amount' => $amount,
            'date' => $postingDate,
        ]);
    }

//    public function testAddServiceCharge(): void
//    {
//        $empId = 2;
//        $memberId = 86;
//        $name = 'shayan';
//        $address = 'Home';
//        $hourlyRate = 1.0;
//
//        $this
//            ->artisan("AddEmp {$empId} {$name} {$address} H {$hourlyRate}")
//            ->assertSuccessful();
//
//        $this
//            ->artisan("ServiceCharge {$memberId} {}")
//    }
}
