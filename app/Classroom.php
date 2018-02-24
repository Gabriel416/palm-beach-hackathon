<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Classroom extends Model
{
    protected $fillable = [
        'school', 'city', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public static function find($userId)
    {
        return User::with('classroom')->find($userId);
    }
}
