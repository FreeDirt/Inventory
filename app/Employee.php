<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\Country;
use App\Company;
use App\Designation;
use App\Department;
use App\Ipaddress;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name', 'email','employee_no','gender','cover_image','user_id','created_at','updated_at'];

    public function stocks()
    {
        return $this->belongsTo('App\Stock', 'stock_id');
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
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }
}


