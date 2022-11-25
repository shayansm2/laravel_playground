<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSD extends Model
{
    use HasFactory;

    protected $table = 'SSDs';

    protected $fillable = [
        'name',
        'capacity',
    ];

    public function getPriceAttribute()
    {
        return $this->getCapacity() * 15;
    }

    private function getCapacity()
    {
        return $this->capacity;
    }
}
