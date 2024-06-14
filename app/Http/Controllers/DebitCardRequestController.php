<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Form;
use App\DebitCardRequest;
use Auth;

class DebitCardRequestController extends Controller
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
        if($user->role->role == 'Administrator' || $user->role->role == 'Monitor'){
            $forms = DebitCardRequest::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
            $pforms = DebitCardRequest::where('status','<>','pending')->Paginate(25);
        }
        else{
            $forms = DebitCardRequest::where('status','pending')->where('branch',$user->branch->branch_name)->orderBy('id','desc')->simplePaginate(25);
            $pforms = DebitCardRequest::where('status','<>','pending')->where('branch',$user->branch->branch_name)->Paginate(25);
        }
        $form = Form::where('model','DebitCardRequest')->first();
        return view('admin.forms.debit_card_request_forms',compact('user','active','forms','pforms','form'));
    }

    public function viewForm(Request $request){
        $code = $request->code;
        $name = $request->name;
        $mobile =$request->mobile;
        $account = $request->account;
        $cidnumber = $request->cidnumber;
        $active = 'f';
        $user = $this->authUser();
        $sform = DebitCardRequest::findorfail($request->id);
        $form = Form::where('model','DebitCardRequest')->first();
        $action = $request->action;
        if($user->role->role != 'Administrator' && $user->role->role != 'Monitor' && $sform->branch != $user->branch->branch_name){
            return redirect()->route('dashboard_path')->with(['status'=>'1', 'msg'=>'You do not have Permission to view the requested application.']);
        }
        return view('admin.forms.debit_card_request_show',compact('active','user','sform','form','action','name','account','mobile','cidnumber','code'));
    }

    public function getSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','DebitCardRequest')->first();
        return view('admin.forms.debit_card_request_search',compact('active','user','form'));
    }

    public function searchForm(Request $request){
        $code = $request->Code;
        $name = $request->Name;
        $account = $request->AccountNumber;
        $mobile = $request->MobileNumber;
        $cidnumber = $request->CIDNumber;


        $form = Form::where('model','DebitCardRequest')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
        $forms = DebitCardRequest::when($name, function ($query, $name) {
                    return $query->where('name','like','%'.$name.'%');
                })
                ->when($account, function ($query, $account) {
                    return $query->where('account_number','like','%'.$account.'%');
                })
                ->when($mobile, function ($query, $mobile) {
                    return $query->where('mobile_no','like','%'.$mobile.'%');
                })
                ->when($cidnumber, function ($query, $cidnumber) {
                    return $query->where('cid','like','%'.$cidnumber.'%');
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code', $code);
                })
                ->when($user, function ($query, $user) {
                    if($user->role->role != 'Administrator' && $user->role->role != 'Monitor'){
                        $query->where('branch',$user->branch->branch_name);
                    }
                    return $query;
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.debit_card_request_search', compact('forms','form','active','user','action','name','account','mobile','cidnumber','code'));
    }
}
