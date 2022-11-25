<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
    use HasFactory;

    protected $table = 'RAMs';

    protected $fillable = [
        'name',
        'capacity',
    ];

    public function getPriceAttribute()
    {
        return $this->getCapacity() * 20;
    }

    private function getCapacity()
    {
        return $this->capacity;
    }
}
