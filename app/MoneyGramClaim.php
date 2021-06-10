<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoneyGramClaim extends Model
{
    protected $table = 'money_gram_claim';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
