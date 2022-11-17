<?php

use App\Console\Commands\PayRollCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command(
    'AddEmp {empId} {name} {address} {salaryType} {salaryArg1} {salaryArg2=0}',
    function (int $empId, string $name, string $address, string $salaryType, $salaryArg1, $salaryArg2) {
        PayRollCommand::addEmployee($empId, $name, $address, $salaryType, $salaryArg1, $salaryArg2);
    })->purpose('Use Case 1: Add New Employee');

Artisan::command(
    'DelEmp {empId}',
    function (int $empId) {
        PayRollCommand::deleteEmployee($empId);
    })->purpose('Use Case 2: Deleting an Employee');

Artisan::command(
    'TimeCard {empId} {date} {hours}',
    function (int $empId, string $date, int $hours) {
        PayRollCommand::PostTimeCard($empId, $date, $hours);
    })->purpose('Use Case 3: Post a Time Card');

Artisan::command(
    'SalesReceipt {empId} {date} {amount}',
    function (int $empId, string $date, int $amount) {
        PayRollCommand::PostSalesReceipt($empId, $date, $amount);
    })->purpose('Use Case 4: Posting a Sales Receipt');
