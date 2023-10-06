<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NRBLoanApplication;
use App\Form;
use Auth;

class NRBLoanApplicationController extends Controller
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
            $forms = NRBLoanApplication::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
            $pforms = NRBLoanApplication::where('status','<>','pending')->Paginate(25);
        }
        else
        {
            $forms = NRBLoanApplication::where('status','pending')->where('branch',$user->branch->branch_name)->orderBy('id','desc')->simplePaginate(25);
            $pforms = NRBLoanApplication::where('status','<>','pending')->where('branch',$user->branch->branch_name)->Paginate(25);
        }
        $form = Form::where('model','NRBLoanApplication')->first();
        return view('admin.forms.nrb_loan_application_forms',compact('user','active','forms','pforms','form'));
    }

    public function viewForm(Request $request){
        $code = $request->code;
        $name = $request->name;
        $cid = $request->cid;
        $active = 'f';
        $user = $this->authUser();
        $sform = NRBLoanApplication::findorfail($request->id);
        $form = Form::where('model','NRBLoanApplication')->first();
        $action = $request->action;
        if($user->role->role != 'Administrator' && $user->role->role != 'Monitor' && $sform->branch != $user->branch->branch_name){
            return redirect()->route('dashboard_path')->with(['status'=>'1', 'msg'=>'You do not have Permission to view the requested application.']);
        }
        //return view('admin.forms.nrb_loan_application_show',compact('active','user','sform','form','action','name','account','mobile','cidnumber','code'));
        return view('admin.forms.nrb_loan_application_show',compact('active','user','sform','form','action','name','code','cid'));
    }

    public function getSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','NRBLoanApplication')->first();
        return view('admin.forms.nrb_loan_application_search',compact('active','user','form'));
    }

    public function searchForm(Request $request){
        $code = $request->code;
        $name = $request->Name;
        $cid = $request->CID;
        $form = Form::where('model','NRBLoanApplication')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
        $forms = NRBLoanApplication::when($name, function ($datequery, $name) {
                    return $query->where('name','like','%'.$name.'%');
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code','like','%'.$code.'%');
                })
                ->when($cid, function ($query, $cid) {
                    return $query->where('cid','like','%'.$cid.'%');
                })
                ->when($user, function ($query, $user) {
                    if($user->role->role != 'Administrator' && $user->role->role != 'Monitor'){
                        $query->where('homebranch',$user->branch->branch_name);
                    }
                    return $query;
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.nrb_loan_application_search', compact('forms','form','active','user','action','code','name','cid'));
    }
}