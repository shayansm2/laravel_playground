<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function price(): Attribute
    {
        return Attribute::get(
            fn ($value, $attributes) => $attributes['capacity'] * 20,
        );
    }
}
