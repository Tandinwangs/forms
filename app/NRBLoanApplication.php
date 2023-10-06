<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NRBLoanApplication extends Model
{
    protected $table = 'nrb_loan_application';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
