<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function forms(){
    	return $this->hasMany('App\RoleAndForm');
    }
}
