<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAndForm extends Model
{
    protected $table = 'roles_and_forms';

    public function role(){
    	return $this->belongsTo('App\Role');
    } 

    public function form(){
    	return $this->belongsTo('App\Form');
    }
}
