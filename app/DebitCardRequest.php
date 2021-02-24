<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitCardRequest extends Model
{
    protected $table = 'debit_card_request';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
