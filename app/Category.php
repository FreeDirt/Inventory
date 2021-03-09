<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Device;
use App\Parentcat;

class Category extends Model
{
    public $fillable = ['name'];

    // protected $table = "categories";

    public function inventories() {
        return $this->hasMany('App\Inventory');
    }

    public function devices() {
        return $this->hasMany('App\Device');
    }

    public function parentcat()
    {
        return $this->belongsTo('App\Parentcat', 'parentcat_id');
    }
}
