<?php

namespace App;
use App\Device;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id');
    }
}
