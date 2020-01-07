<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\Company;
use App\Designation;
use App\Department;
use App\Ipaddress;

class Employee extends Model
{
    protected $table = 'employees';

    public function stocks()
    {
        return $this->belongsTo('App\Stock');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation', 'designation_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function ipaddress()
    {
        return $this->belongsTo('App\Ipaddress', 'ipaddress_id');
    }
}


