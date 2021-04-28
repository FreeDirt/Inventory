<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empstatus extends Model
{
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }
}
