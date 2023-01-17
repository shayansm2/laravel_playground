<?php

namespace App\Models;

use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Order extends Model implements HasLocalePreference
{
    use HasFactory;

    public function user(): Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function preferredLocale()
    {
        return $this->user->locale;
    }
}
