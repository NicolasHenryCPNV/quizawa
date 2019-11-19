<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'private', 'user_id',
    ];
}
