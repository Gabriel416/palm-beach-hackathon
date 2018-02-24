<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classroom;
use App\Professional;

class Question extends Model
{
    protected $fillable = [
        'professional_id', 'classroom_id', 'twilio_id', 'title'
    ];


    public function professional() {
        return $this->belongsTo('App\Professional');
    }

    public function classroom() {
        return $this->belongsTo('App\Classroom');
    }
}
