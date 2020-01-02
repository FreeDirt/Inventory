<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Device;

class Brand extends Model
{
    public $fillable = ['name'];

    // protected $table = "brands";

    public function inventories() {
        return $this->hasMany('App\Inventory');
    }
    
    public function devices() {
        return $this->belongsToMany('App\Device');
    }
}
