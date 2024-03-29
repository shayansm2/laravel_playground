<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations;

/**
 * @method static self find(int $id)
 */

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function discount(): Relations\HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function courses(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_user');
    }

    public function questions(): Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function products(): Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function posts(): Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function orders(): Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function preferredLocale()
    {
        return $this->locale;
    }
}
