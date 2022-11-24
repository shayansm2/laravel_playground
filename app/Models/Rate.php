<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Rate extends Model
{
    use HasFactory;

    public function rateable(): Relations\MorphTo
    {
        return $this->morphTo();
    }
}
