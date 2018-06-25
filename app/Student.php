<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = ['name', 'father_name', 'address', 'phone_no', 'grade_id', 'class_id'];
}
