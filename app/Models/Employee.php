<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public const SALARY_TYPE_HOURLY_RATE = 'H';
    public const SALARY_TYPE_MONTHLY_SALARY = 'S';
    public const SALARY_TYPE_COMMISSION_SALARY = 'C';

    public const SALARY_TYPES = [
        self::SALARY_TYPE_COMMISSION_SALARY,
        self::SALARY_TYPE_HOURLY_RATE,
        self::SALARY_TYPE_MONTHLY_SALARY,
    ];

    protected $fillable = [
        'id',
        'name',
        'address',
        'salary_type',
        'hourly_rate',
        'commission_rate',
        'monthly_salary',
    ];
}
