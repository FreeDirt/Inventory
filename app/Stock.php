<?php

namespace App;
use App\Device;
use App\User;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
