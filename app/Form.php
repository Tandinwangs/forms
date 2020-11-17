<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function roles(){
    	return $this->belongsTo('App\RoleAndForm', 'id','form_id');
    }
}
