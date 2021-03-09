<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Employee;

class Parentcat extends Model
{
    public $fillable = ['name'];
    
    public function employees() {
        return $this->belongsToMany('App\Employee');
    }

    public function category() {
        return $this->belongsToMany('App\Category');
    }
}
