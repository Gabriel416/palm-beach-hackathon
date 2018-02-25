<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'name'
    ];

    public function professionals() {
        return $this->belongsToMany('App\Professional');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
