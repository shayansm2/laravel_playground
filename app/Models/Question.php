<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Question extends Model
{
    use HasFactory;

    public function user(): Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function messages(): Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }
}
