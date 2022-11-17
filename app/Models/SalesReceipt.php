<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'amount',
    ];
}
