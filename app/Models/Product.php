<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Product extends Model
{
    use HasFactory;

    public function user(): Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): Relations\MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function rates(): Relations\MorphMany
    {
        return $this->morphMany(Rate::class, 'rateable');
    }
}
