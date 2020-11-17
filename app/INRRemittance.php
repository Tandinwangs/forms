<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INRRemittance extends Model
{
    protected $table = 'inrremittance';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
