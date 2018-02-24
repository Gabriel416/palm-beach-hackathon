<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Professional extends Model
{
    protected $fillable = [
        'linked_in_id', 'work_place', 'bio', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public static function find($userId)
    {
        return User::with('professional')->find($userId);
    }
}
