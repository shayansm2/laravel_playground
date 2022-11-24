<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Comment extends Model
{
    use HasFactory;

    public function post(): Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
