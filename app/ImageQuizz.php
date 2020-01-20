<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageQuizz extends Model
{
    public $timestamps = false;

    public function quizz()
    {
        return $this->belongsTo('App\Quizz');
    }
}
