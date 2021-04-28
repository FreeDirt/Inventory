<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Software;
use App\Employee;

// \Carbon\Carbon::setToStringFormat('d-m-Y');


class Softwareuser extends Model
{
    public $fillable = ['name'];

    protected $dates = ['due_date'];

    public function setDateAttribute( $value ) {
        $this->attributes['due_date'] = (new Carbon($value))->format('d/m/y');
      }

    // public function getDueDateAttribute($values) {
    //     //  return "wew";
    //      return Carbon::createFromTimestamp(strtotime($values))->format('d-m-Y');
    // }

    public function software()
    {
        return $this->belongsTo('App\Software', 'software_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
