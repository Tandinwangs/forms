<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\INRRemittance;
use App\Form;
use Auth;

class INRRemittanceController extends Controller
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
            $forms = INRRemittance::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
            $pforms = INRRemittance::where('status','<>','pending')->Paginate(25);
        }
        else
        {
            $forms = INRRemittance::where('status','pending')->where('homebranch',$user->branch->branch_name)->orderBy('id','desc')->simplePaginate(25);
            $pforms = INRRemittance::where('status','<>','pending')->where('homebranch',$user->branch->branch_name)->Paginate(25);
        }
        $form = Form::where('model','INRRemittance')->first();
        return view('admin.forms.inr_remittance_forms',compact('user','active','forms','pforms','form'));
    }

    public function viewForm(Request $request){
        $name = $request->name;
        $mobile =$request->mobile;
        $account = $request->account;
        $code = $request->code;
        $idnumber = $request->idnumber;
        $bname = $request->bname;
        $bmobile = $request->bmobile;
        $active = 'f';
        $user = $this->authUser();
        $sform = INRRemittance::findorfail($request->id);
        $form = Form::where('model','INRRemittance')->first();
        $action = $request->action;
        if($user->role->role != 'Administrator' && $user->role->role != 'Monitor' && $sform->homebranch != $user->branch->branch_name)
        {
            return redirect()->route('dashboard_path')->with(['status'=>'1', 'msg'=>'You do not have Permission to view the requested application.']);
        }
        return view('admin.forms.inr_remittance_show',compact('active','user','sform','form','action','name','account','mobile','bname','idnumber','code','bmobile'));
    }

     public function getSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','INRRemittance')->first();
        return view('admin.forms.inr_remittance_search',compact('active','user','form'));
    }

    public function searchForm(Request $request){
        $code = $request->code;
        $name = $request->Name;
        $account = $request->AccountNumber;
        $mobile = $request->MobileNumber;
        $idnumber = $request->IdNumber;
        $bname = $request->BeneficiaryName;
        $bmobile = $request->BeneficiaryMobileNumber;

        $form = Form::where('model','INRRemittance')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
        $forms = INRRemittance::when($name, function ($query, $name) {
                    return $query->where('name','like','%'.$name.'%');
                })
                ->when($account, function ($query, $account) {
                    return $query->where('accountnumber','like','%'.$account.'%');
                })
                ->when($mobile, function ($query, $mobile) {
                    return $query->where('mobile_no','like','%'.$mobile.'%');
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code','like','%'.$code.'%');
                })
                ->when($idnumber, function ($query, $idnumber) {
                    return $query->where('idnumber','like','%'.$idnumber.'%');
                })
                ->when($bname, function ($query, $bname) {
                    return $query->where('beneficiaryname','like','%'.$bname.'%');
                })
                ->when($bmobile, function ($query, $bmobile) {
                    return $query->where('beneficiarymobilenumber','like','%'.$bmobile.'%');
                })
                ->when($user, function ($query, $user) {
                    if($user->role->role != 'Administrator' && $user->role->role != 'Monitor'){
                        $query->where('homebranch',$user->branch->branch_name);
                    }
                    return $query;
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.inr_remittance_search', compact('forms','form','active','user','action','code','name','account','mobile','bname','idnumber','bmobile'));
    }
}
