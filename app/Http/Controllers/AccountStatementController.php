<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountStatementController extends Controller
{
    /**
    * account statement form
    * @param request
    * @return view
    */ 
    public function getForm(){
    	return view('accountstatement.form');
    }

    /**
    * account statement submission
    * @param request
    * @return view for entering otp on success
    */ 
    public function verifyInfo(Request $request){
        $request->validate([
            'AccountNumber'=>'required|digits:13',
            'MobileNumber'=>'required|digits:8',
            'FromDate'=>'required|date',
            'ToDate'=>'required|date',
            'Agreement'=>'regex:/^agree$/',
        ]);
        return view('accountstatement.otp');
    }



    /**
    * account statement form
    * @param request
    * @return view
    */ 
    // public function getOTPForm(){
    // 	return view('accountstatement.otp');
    // }
}
