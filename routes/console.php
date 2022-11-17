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
    function ($empId, $name, $address, $salaryType, $salaryArg1, $salaryArg2) {
        PayRollCommand::addEmployee($empId, $name, $address, $salaryType, $salaryArg1, $salaryArg2);
    })->purpose('Add New Employee');

Artisan::command(
    'DelEmp {empId}',
    function ($empId) {
        PayRollCommand::deleteEmployee($empId);
    })->purpose('Deleting an Employee');
