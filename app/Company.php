<?php

namespace App;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
