<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class Ipaddress extends Model
{

    protected $table = 'ipaddresses';

    public function employees() {
        return $this->belongsToMany('App\Employee');
    }
}
