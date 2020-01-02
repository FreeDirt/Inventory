<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\Company;

class Employee extends Model
{
    protected $table = 'employees';

    public function stocks()
    {
        return $this->belongsTo('App\Stock');
    }

    public function companies()
    {
        return $this->belongsTo('App\Company');
    }
}


