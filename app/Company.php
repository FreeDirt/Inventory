<?php

namespace App;
use App\Device;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }

    public function Devices() {
        return $this->belongsToMany('App\Device');
    }
    
}
