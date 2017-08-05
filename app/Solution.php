<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
