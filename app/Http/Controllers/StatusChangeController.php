<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

use App\Form;
use App\Gift;
use App\Branch;
use App\User;
use App\RoleAndForm;
use App\PrematureWithdrawal;
use App\Mail\FormStatusChanged;
use App\INRRemittance;
use App\DebitCardRequest;
use App\MoneyGramClaim;
use App\AccountDetailUpdate;
use App\Notifier;
use Carbon\Carbon;
use Auth;

use App\Mail\Notified;

class StatusChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to send sms
    protected function sendSMS($form){
        if ($form->status == 'approved'){
            if(substr($form->code,0,3) == 'DCR'){
                if($form->debit_card_type == 'VISA Debit Card' && $form->branch != 'Corporate Branch'){
                    $msg = "Dear Customer, Your debit card request has been approved. Bank shall inform you once the card is ready.";
                }
                else{
                    $msg = "Dear Customer, Your debit card request has been approved and it can be collected after two working days.";
                }
            }
            else{
                $msg = "Your form: $form->code has been approved by the bank. Thank you!";
            }
        }else{
            $msg = "Your form: $form->code has been Rejected by the Bank because $form->reasonforrejection. Thank you!";
        }
        $api = Notifier::first();

        Http::get($api->sms_api,[
            'app'=>'ws',
            'u'=>'everest',
            'h'=>'05265e9a544462b468b70ab663a4a4cf',
            'op'=>'pv',
            'to'=>$form->mobile_no,
            'msg'=>$msg,
        ]);
    }
    
    // function to send email
    public function sendEmail($form){
        Mail::to($form->email)->send(new FormStatusChanged($form));
    }

    public function sendNotification($details,$role,$branch){
        $branch_id = Branch::where('branch_name',$branch)->pluck('id');
        $users = User::where('role_id',$role)->where('branch_id',$branch_id)->get();
        Mail::to($users)->send(new Notified($details));
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
        elseif ($request->category == 'debit-card-request' || $request->category == 'debit-card-request-search') {
            $form = DebitCardRequest::findorfail($request->id);
        }
        elseif ($request->category == 'moneygram-claim' || $request->category == 'moneygram-claim-search') {
            $form = MoneyGramClaim::findorfail($request->id);
        }
        elseif ($request->category == 'account-detail-update' || $request->category == 'account-detail-update-search') {
            $form = AccountDetailUpdate::findorfail($request->id);
        }
        if($request->action == 'approve')
        {
            $form->status = 'approved';
            $form->action_date = Carbon::now();
            $form->user_id = Auth::id();
            if(!blank($form->mobile_no)){
               $this->sendSMS($form);
            }
            if(!blank($form->email)){
            $this->sendEmail($form);
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
                    $this->sendEmail($form);
                }
                if(!blank($form->mobile_no)){
                    $this->sendSMS($form);
                }
            }
        }
        elseif ($request->action == 'change' || $request->action == 'change-br') {
            if($request->category == 'inr-remittance'){
                $form->homebranch = $request->branch;
                $f = Form::where('model','INRRemittance')->first();
            }
            elseif($request->category == 'gift')
            {
                $form->branch = $request->branch;
                $f = Form::where('model','Gift')->first();
            }
            elseif($request->category == 'premature-withdrawal')
            {
                $form->branch = $request->branch;
                $f = Form::where('model','PrematureWithdrawal')->first();
            }
            elseif($request->category == 'moneygram-claim')
            {
                $form->branch = $request->branch;
                $f = Form::where('model','MoneyGramClaim')->first();
            }
            elseif($request->category == 'account-detail-update')
            {
                $form->branch = $request->branch;
                $f = Form::where('model','AccountDetailUpdate')->first();
            }

            $rids = RoleAndForm::where('form_id',$f->id)->pluck('role_id');
                
            foreach ($rids as $rid) {
                $this->sendNotification($form,$rid,$request->branch);
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
            elseif ($request->category == 'debit-card-request'){
                $route = 'debit_card_request_forms_path';
            }
            elseif ($request->category == 'debit-card-request-search'){
                $params = [$request->id,'search-show'];
                $route = 'show_debit_card_request_form_path';
            }
            elseif ($request->category == 'moneygram-claim'){
                $route = 'money_gram_claim_forms_path';
            }
            elseif ($request->category == 'moneygram-claim-search'){
                $params = [$request->id,'search-show'];
                $route = 'show_money_gram_claim_form_path';
            }
            elseif ($request->category == 'account-detail-update'){
                $route = 'account-detail-update_forms_path';
            }
            elseif ($request->category == 'account-detail-update-search'){
                $params = [$request->id,'search-show'];
                $route = 'show_account-detail-update_form_path';
            }
            
        }

    	return redirect()->route($route,$params)->with(['status'=>$status, 'msg'=>$msg]);
    }
}
