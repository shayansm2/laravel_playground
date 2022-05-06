<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'digiclub_lotteries';

    public $timestamps = true;
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $dates = [
        'start_at',
        'end_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'start_at',
        'end_at'
    ];

    protected $guarded = ['active'];

    protected $casts = [
        'active' => 'boolean',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected $withCount = ['user_chances'];

    // instance call like $lottery->slug_name
    public function slugName(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => str_replace(' ', '-', trim($attributes['name']))
        );
    }

    // static call like Lottery::availableLotteries()
    public function scopeAvailableLotteries(Builder $query): Builder
    {
        $now = Carbon::now();

        return $query
            ->where('start_at', '<=', $now->toDateTimeString())
            ->where('end_at', '>', $now->toDateTimeString())
            ->where('active', true);
    }

    public function lotteryChances(): HasMany
    {
        return $this->hasMany(UserChances::class);
    }
}
