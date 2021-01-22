<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

use App\Gift;
use App\PrematureWithdrawal;
use App\Mail\FormStatusChanged;
use App\INRRemittance;
use App\Notifier;
use Carbon\Carbon;
use Auth;

class StatusChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to send sms
    protected function sendSMS($mobile,$code,$status,$reason = null){
        if ($status == 'approved'){
            $msg = "Your form: $code has been approved by the bank. Thank you.";
        }else{
            $msg = "Your form: $code has been Rejected by the Bank because $reason. Thank you";
        }
        $api = Notifier::first();

        Http::get($api->sms_api,[
            'app'=>'ws',
            'u'=>'everest',
            'h'=>'05265e9a544462b468b70ab663a4a4cf',
            'op'=>'pv',
            'to'=>$mobile,
            'msg'=>$msg,
        ]);
    }
    
    // function to send email
    public function sendEmail($email,$code,$status,$reason = null){
        Mail::to($email)->send(new FormStatusChanged($code,$status,$reason));
    }
    
    public function changeStatus(Request $request){
    	$status = '0';
    	$msg = 'Form status could not be changed. Please try again.';
    	$route = 'dashboard_path';
    	$params = null;
    	if($request->category == 'gift' || $request->category == 'gift-search' ){
    		$form = Gift::findorfail($request->id);
    	}
        elseif($request->category == 'premature-withdrawal' || $request->category == 'premature-withdrawal-search'){
            $form = PrematureWithdrawal::findorfail($request->id);
        }
        elseif ($request->category == 'inr-remittance'||$request->category == 'inr-remittance-search') {
            $form = INRRemittance::findorfail($request->id);
        }
        
        if($request->action == 'approve')
        {
            $form->status = 'approved';
            $form->action_date = Carbon::now();
            $form->user_id = Auth::id();
            if(!blank($form->email)){
                $this->sendEmail($form->email,$form->code,$form->status);
            }
            if(!blank($form->mobile_no)){
                $this->sendSMS($form->mobile_no,$form->code,$form->status);
            }
        }
        elseif($request->action == 'reject')
        {
            if(!blank($request->reason))
            {
                $form->status = 'rejected';
                $form->reasonforrejection = $request->reason;
                $form->action_date = Carbon::now();
                $form->user_id = Auth::id();
                
                if(!blank($form->email)){
                    $this->sendEmail($form->email,$form->code,$form->status,$form->reasonforrejection);
                }
                if(!blank($form->mobile_no)){
                    $this->sendSMS($form->mobile_no,$form->code,$form->status,$form->reasonforrejection);
                }
            }
        }
        elseif ($request->action == 'change') {
            if($request->category == 'inr-remittance'){
                $form->homebranch = $request->branch;
            }
            else{
                $form->branch = $request->branch;
            }
        }
        else{
            $form->status = 'pending';
            $form->action_date = Carbon::now();
            $form->user_id = Auth::id();
        }

        if($form->save()){
            $status = '1';
            $msg = 'Form status has been changed successfully.';
            if($request->category == 'gift'){
                $route = 'gift_forms_path';
            }
            elseif($request->category == 'gift-search'){
                $params = [$request->id,'search-show'];
                $route = 'show_gift_form_path';
            }
            elseif ($request->category == 'premature-withdrawal') {
                $route = 'premature_withdrawal_forms_path';
            }
            elseif ($request->category == 'premature-withdrawal-search') {
                $params = [$request->id,'search-show'];
                $route = 'show_premature_withdrawal_form_path';
            }
            elseif ($request->category == 'inr-remittance') {
                $route = 'inr_remittance_forms_path';
            }
            elseif ($request->category == 'inr-remittance-search'){
                $params = [$request->id,'search-show'];
                $route = 'show_inr_remittance_form_path';
            }
        }

    	return redirect()->route($route,$params)->with(['status'=>$status, 'msg'=>$msg]);
    }
}
