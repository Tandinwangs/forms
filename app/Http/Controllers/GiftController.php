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

    public function getGiftForms(){
        $active = 'f';
        $user = $this->authUser();
        if($user->role->role == 'Administrator'){
            $forms = Gift::where('status','pending')->orderBy('id','desc')->simplePaginate(25);
            $pforms = Gift::where('status','<>','pending')->Paginate(25);
        }
        else{
            $forms = Gift::where('status','pending')->where('branch',$user->branch->branch_name)->orderBy('id','desc')->simplePaginate(25);
            $pforms = Gift::where('status','<>','pending')->where('branch',$user->branch->branch_name)->Paginate(25);
        }
        $form = Form::where('model','Gift')->first();
        return view('admin.forms.gifts',compact('user','active','forms','pforms','form'));
    }

    public function viewGiftForm(Request $request){
        $code = $request->code;
        $cname = $request->cname;
        $cmobile =$request->cmobile;
        $caccount = $request->caccount;
        $bname = $request->bname;
        $baccount = $request->baccount;
        $bank = $request->bank;
        $active = 'f';
        $user = $this->authUser();
        $gift = Gift::findorfail($request->id);
        $form = Form::where('model','Gift')->first();
        $action = $request->action;
        if($user->role->role != 'Administrator' && $gift->branch != $user->branch->branch_name)
        {
            return redirect()->route('dashboard_path')->with(['status'=>'1', 'msg'=>'You do not have Permission to view the requested application.']);
        }
        return view('admin.forms.giftshow',compact('active','user','gift','form','action','cname','caccount','cmobile','bname','baccount','bank','code'));
    }

    public function getGiftSearchForm(){
        $active = 'f';
        $user = $this->authUser();
        $form = Form::where('model','Gift')->first();
        return view('admin.forms.giftsearch',compact('active','user','form'));
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
                ->when($user, function ($query, $user) {
                    if($user->role->role != 'Administrator'){
                        $query->where('branch',$user->branch->branch_name);
                    }
                    return $query;
                })
                ->orderBy('id','desc')->get();
        return view('admin.forms.giftsearch', compact('forms','form','active','user','action','cname','caccount','cmobile','bname','baccount','bank','code'));
    }
}
