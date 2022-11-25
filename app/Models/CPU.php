<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;

    protected $table = 'CPUs';

    protected $fillable = [
        'name',
        'frequency',
    ];

    public function getPriceAttribute(): float|int
    {
        return $this->getFrequency() * 100;
    }

    private function getFrequency()
    {
        return $this->frequency;
    }
}
