<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    public $fillable = ['name'];
    
    public function users() {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
