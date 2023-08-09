<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountDetailUpdate extends Model
{
    protected $table = 'account_detail_update';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
