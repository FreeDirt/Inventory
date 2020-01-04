<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class Department extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }
}
