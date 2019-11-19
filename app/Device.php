<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\User;

class Device extends Model
{

    public $fillable = ['deviceName'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }
}
