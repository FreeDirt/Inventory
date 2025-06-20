<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Country;
use App\Company;
use App\Brand;
use App\User;

class Device extends Model
{

    public $fillable = ['deviceName','cover_image'];

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

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
}
