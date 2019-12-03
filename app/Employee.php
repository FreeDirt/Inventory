<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class Employee extends Model
{
    protected $table = 'employees';

    public function stocks()
    {
        return $this->belongsTo('App\Stock');
    }
}


