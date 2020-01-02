<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class Designation extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }
}
