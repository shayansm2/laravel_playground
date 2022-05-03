<?php

namespace App\Models;

use App\Scopes\NotExpiredScope;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new NotExpiredScope);
    }

    public function scopeNearToExpire(Builder $query, CarbonInterval $interval)
    {
        $now = Carbon::now();

        $query
            ->where('expires_at' , '>' , $now->toDateTimeString())
            ->where('expires_at', '<=', $now->add($interval)->toDateTimeString());
    }
}
