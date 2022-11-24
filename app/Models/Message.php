<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Message extends Model
{
    use HasFactory;

    public function question(): Relations\BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
