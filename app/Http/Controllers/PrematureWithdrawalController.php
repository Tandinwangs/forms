<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\PrematureWithdrawal;
use Auth;

class PrematureWithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function authUser(){
		return Auth::user();
	} 

    public function getForms(){
        $active = 'f';
        $user = $this->authUser();
        $forms = PrematureWithdrawal::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
        $pforms = PrematureWithdrawal::where('status','<>','pending')->Paginate(25);
        $form = Form::where('model','PrematureWithdrawal')->first();
        return view('admin.forms.premature_withdrawal_forms',compact('user','active','forms','pforms','form'));
    }

    public function viewForm(Request $request){
        $code = $request->code;
        $name = $request->name;
        $mobile =$request->mobile;
        $account = $request->account;
        $fdrdaccount = $request->fdrdaccount;
        $idnumber = $request->idnumber;
        $active = 'f';
        $user = $this->authUser();
        $sform = PrematureWithdrawal::find($request->id);
        $form = Form::where('model','PrematureWithdrawal')->first();
        $action = $request->action;
        return view('admin.forms.premature_withdrawal_show',compact('active','user','sform','form','action','name','account','mobile','fdrdaccount','idnumber','code'));
    }

    public function getSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','PrematureWithdrawal')->first();
        return view('admin.forms.premature_withdrawal_search',compact('active','user','form'));
    }

    public function searchForm(Request $request){
        $code = $request->Code;
        $name = $request->Name;
        $account = $request->SavingAccountNumber;
        $mobile = $request->MobileNumber;
        $fdrdaccount = $request->FdRdAccountNumber;
        $idnumber = $request->IdNumber;


        $form = Form::where('model','PrematureWithdrawal')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
        $forms = PrematureWithdrawal::when($name, function ($query, $name) {
                    return $query->where('name','like','%'.$name.'%');
                })
                ->when($account, function ($query, $account) {
                    return $query->where('account_number','like','%'.$account.'%');
                })
                ->when($mobile, function ($query, $mobile) {
                    return $query->where('mobile_no','like','%'.$mobile.'%');
                })
                ->when($fdrdaccount, function ($query, $fdrdaccount) {
                    return $query->where('tdrd_account_number','like','%'.$fdrdaccount.'%');
                })
                ->when($idnumber, function ($query, $idnumber) {
                    return $query->where('cid','like','%'.$idnumber.'%');
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code', $code);
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.premature_withdrawal_search', compact('forms','form','active','user','action','name','account','mobile','fdrdaccount','idnumber','code'));
    }

}
