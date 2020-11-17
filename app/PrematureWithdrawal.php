<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrematureWithdrawal extends Model
{
    protected $table = 'premature_withdrawal';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
