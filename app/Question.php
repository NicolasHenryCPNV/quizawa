<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'image', 'quizz_id'
    ];

    public function quizz()
    {
        return $this->belongsTo('App\Quizz');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }
}
