<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classroom;
use App\Professional;

class Question extends Model
{
    protected $fillable = [
        'title', 'professional_id', 'classroom_id', 'twilio_id', 'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function professional() {
        return $this->belongsTo('App\Professional');
    }

    public function classroom() {
        return $this->belongsTo('App\Classroom');
    }
}
