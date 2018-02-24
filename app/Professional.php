<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Professional extends Model
{
    protected $fillable = [
        'linked_in_id', 'work_place', 'bio', 'user_id','job_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
    
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public static function find($userId)
    {
        return User::with('professional.job')->find($userId);
    }
}
