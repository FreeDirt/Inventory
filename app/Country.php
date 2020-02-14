<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Device;

class Country extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }

    public function devices() {
        return $this->belongsToMany('App\Device');
    }
}
