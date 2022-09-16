<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable =['name','f_id','class','roll_no','father_name'];
}
