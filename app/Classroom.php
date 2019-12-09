<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany('App\User');
    }
}
