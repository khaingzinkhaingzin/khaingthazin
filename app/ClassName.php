<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    //
    public function grade() {
        return $this->belongsTo('App\Grade');
    }
}
