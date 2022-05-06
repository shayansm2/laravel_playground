<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserChances extends Model
{
    use HasFactory;

    protected $table = 'digiclub_lottery_user_chances';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'user_id',
        'lottery_id',
        'chances'
    ];

    protected $with = [
        'user_id',
        'lottery_id',
    ];

    public function lottery()
    {
        $this->belongsTo(Lottery::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
