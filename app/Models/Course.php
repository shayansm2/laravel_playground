<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function lessons(): Relations\HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function users(): Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function teachers(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher');
    }

    public function questions(): Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }
}
