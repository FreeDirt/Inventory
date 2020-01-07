<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class Ipaddress extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }
}
