<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\Form;
use Auth;

class GiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function authUser(){
		return Auth::user();
	} 

    public function searchGift(Request $request){
        $code = $request->Code;
    	$cname = $request->Name;
    	$caccount = $request->AccountNumber;
    	$cmobile = $request->MobileNumber;
    	$bname = $request->BeneficiaryName;
    	$baccount = $request->BeneficiaryAccountNumber;
    	$bank = $request->BeneficiaryBankName;
        $form = Form::where('model','Gift')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
    	$forms = Gift::when($cname, function ($query, $cname) {
                    return $query->where('name','like','%'.$cname.'%');
                })
    			->when($caccount, function ($query, $caccount) {
                    return $query->where('account_number','like','%'.$caccount.'%');
                })
                ->when($cmobile, function ($query, $cmobile) {
                    return $query->where('mobile_no','like','%'.$cmobile.'%');
                })
                ->when($bname, function ($query, $bname) {
                    return $query->where('beneficiary_name','like','%'.$bname.'%');
                })
                ->when($baccount, function ($query, $baccount) {
                    return $query->where('beneficiary_account_number','like','%'.$baccount.'%');
                })
                ->when($bank, function ($query, $bank) {
                    return $query->where('beneficiary_bank', $bank);
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code', $code);
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.giftsearch', compact('forms','form','active','user','action','cname','caccount','cmobile','bname','baccount','bank','code'));
    }
}
