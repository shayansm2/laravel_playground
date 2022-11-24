<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Teacher extends Model
{
    use HasFactory;

    public function courses(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_teacher');
    }

    public function posts(): Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }
}
