<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoneyGramClaim;
use App\Form;
use Auth;

class MoneyGramClaimController extends Controller
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
            $forms = MoneyGramClaim::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
            $pforms = MoneyGramClaim::where('status','<>','pending')->Paginate(25);
        }
        else
        {
            $forms = MoneyGramClaim::where('status','pending')->where('branch',$user->branch->branch_name)->orderBy('id','desc')->simplePaginate(25);
            $pforms = MoneyGramClaim::where('status','<>','pending')->where('branch',$user->branch->branch_name)->Paginate(25);
        }
        $form = Form::where('model','MoneyGramClaim')->first();
        return view('admin.forms.money_gram_claim_forms',compact('user','active','forms','pforms','form'));
    }

    public function viewForm(Request $request){
        $code = $request->code;
        $name = $request->name;
        $moneygram_reference_number = $request->moneygram_reference_number;
        $active = 'f';
        $user = $this->authUser();
        $sform = MoneyGramClaim::findorfail($request->id);
        $form = Form::where('model','MoneyGramClaim')->first();
        $action = $request->action;
        if($user->role->role != 'Administrator' && $user->role->role != 'Monitor' && $sform->branch != $user->branch->branch_name){
            return redirect()->route('dashboard_path')->with(['status'=>'1', 'msg'=>'You do not have Permission to view the requested application.']);
        }
        //return view('admin.forms.money_gram_claim_show',compact('active','user','sform','form','action','name','account','mobile','cidnumber','code'));
        return view('admin.forms.money_gram_claim_show',compact('active','user','sform','form','action','name','moneygram_reference_number','code'));
    }

    public function getSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','MoneyGramClaim')->first();
        return view('admin.forms.money_gram_claim_search',compact('active','user','form'));
    }

    public function searchForm(Request $request){
        $code = $request->code;
        $name = $request->Name;
        $moneygram_reference_number = $request->MoneyGramReferenceNumber;
        $form = Form::where('model','MoneyGramClaim')->first();
        $user = $this->authUser();
        $active = 'f';
        $action = $request->action;
        $forms = MoneyGramClaim::when($name, function ($query, $name) {
                    return $query->where('name','like','%'.$name.'%');
                })
                ->when($moneygram_reference_number, function ($query, $moneygram_reference_number) {
                    return $query->where('moneygram_reference_number','like','%'.$moneygram_reference_number.'%');
                })
                ->when($code, function ($query, $code) {
                    return $query->where('code','like','%'.$code.'%');
                })
                ->when($user, function ($query, $user) {
                    if($user->role->role != 'Administrator' && $user->role->role != 'Monitor'){
                        $query->where('homebranch',$user->branch->branch_name);
                    }
                    return $query;
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.money_gram_claim_search', compact('forms','form','active','user','action','code','name','moneygram_reference_number'));
    }
}