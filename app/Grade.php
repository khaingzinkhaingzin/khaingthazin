<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //

    public function classes() {
        return $this->hasMany('App\ClassName');
    }
}
