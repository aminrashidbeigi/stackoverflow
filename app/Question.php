<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['title', 'body', 'view'];

    public function solutions(){
        return $this->hasMany('App\Solution');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
