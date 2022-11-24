<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function teacher(): Relations\BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function comments(): Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
