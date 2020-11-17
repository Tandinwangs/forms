<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FormSubmitted;
use App\Mail\Notified;

use App\Branch;
use App\Gift;
use App\Form;
use App\PrematureWithdrawal;
use App\INRRemittance;
use App\RoleAndForm;
use App\Notifier;
use App\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    // function to send sms
    protected function sendSMS($mobile,$code){
        $api = Notifier::first();

        Http::get($api->sms_api,[
            'app'=>'ws',
            'u'=>'everest',
            'h'=>'05265e9a544462b468b70ab663a4a4cf',
            'op'=>'pv',
            'to'=>$mobile,
            'msg'=>$code,
        ]);
    }
    
    // function to send email
    public function sendEmail($email,$code_short){
        Mail::to($email)->send(new FormSubmitted($code_short));
    }

    public function sendNotification($details,$role){
        $users = User::where('role_id',$role)->get();
        Mail::to($users)->send(new Notified($details));
    }

    // Get Form Functions
    public function getForms(){
        $forms = Form::all();
        return view('forms.forms',compact('forms'));
    }

    public function getPrematureWithdrawalForm(){
        $branches = Branch::all();
        return view('forms.premature_withdrawal_form',compact('branches'));
    }

    public function getINRRemittanceForm(){
    	$branches = Branch::all();
    	return view('forms.inr_remittance_form',compact('branches'));
    }

    public function getINRRemittanceRequirement(){
        return view('forms.inr_remittance_requirements_and_charges');
    }

    public function getGiftForm(){
    	$branches = Branch::all();
    	return view('forms.gift',compact('branches'));
    }


    // Submit Form Functions
    public function submitINRRemittanceForm(Request $request){
        $request->validate([
            'Name'=>'required',
            'IDNumber'=>'required',
            'MobileNumber'=>'required|digits:8',
            'Email'=>'required|email',
            'Amount'=>'required|numeric',
            'HomeBranch'=>'required',
            'AccountNumber'=>'required|digits:13',
            'CurrentAddress'=>'required',
            'RemittancePurpose'=>'required',
            'Charges'=>'required',
            'BeneficiaryName'=>'required',
            'BeneficiaryAddress'=>'required',
            'City' => 'required',
            'State'=>'required',
            'PinCode'=>'required',
            'BeneficiaryMobileNumber'=>'required|numeric',
            'BeneficiaryBank'=>'required',
            'BeneficiaryBankBranch'=>'required',
            'BeneficiaryAccountNumber'=>'required',
            'IfscCode'=>'required',
            'Agreement'=>'regex:/^agree$/',
            'Document'=>'file|required_without_all:Document2,Document3|mimes:pdf,png,jpg,jpeg,docx,doc',
            'Document2'=>'file|required_without_all:Document,Document3|mimes:pdf,png,jpg,jpeg,docx,doc',
            'Document3'=>'file|required_without_all:Document,Document2|mimes:pdf,png,jpg,jpeg,docx,doc'
        ]);
        $status = '0';
        $code = null;
        $msg = 'Premature Withdrawal Form could not be submitted. Please try again.';
        $d1 = $d2 = $d3 = null;
        $date = date_format(now(),'Y-m-d');
        $path = "storage/INRRemittanceDcoument/$date";
        if(!blank($request->file('Document'))){
            $d1 = time().'-'.$request->file('Document')->getClientOriginalName();
            $request->file('Document')->storeAs("public/INRRemittanceDcoument/$date",$d1);
        }
        if(!blank($request->file('Document2'))){
            $d2 = time().'-'.$request->file('Document2')->getClientOriginalName();
            $request->file('Document2')->storeAs("public/INRRemittanceDcoument/$date",$d2);
        }
        if(!blank($request->file('Document3'))){
            $d3 = time().'-'.$request->file('Document3')->getClientOriginalName();
            $request->file('Document3')->storeAs("public/INRRemittanceDcoument/$date",$d3);
        }
        $form = new INRRemittance;
        $form->code = 'INRR/'.date_format(Carbon::now(),'Y/m/d/His');
        $form->name = $request->Name;
        $form->idnumber = $request->IDNumber;
        $form->mobile_no = '975'.$request->MobileNumber;
        $form->email = $request->Email;
        $form->amount = $request->Amount;
        $form->homebranch = $request->HomeBranch;
        $form->accountnumber = $request->AccountNumber;
        $form->currentaddress = $request->CurrentAddress;
        $form->remittancepurpose = $request->RemittancePurpose;
        $form->chargesoption = $request->Charges;
        $form->beneficiaryname = $request->BeneficiaryName;
        $form->beneficiaryaddress = $request->BeneficiaryAddress;
        $form->city = $request->City;
        $form->state = $request->State;
        $form->pincode = $request->PinCode;
        $form->beneficiarymobilenumber = $request->BeneficiaryMobileNumber;
        $form->beneficiarybank = $request->BeneficiaryBank;
        $form->beneficiarybankbranch = $request->BeneficiaryBankBranch;
        $form->beneficiaryaccountnumber = $request->BeneficiaryAccountNumber;
        $form->ifsccode = $request->IfscCode;
        $form->path = $path;
        $form->document = $d1;
        $form->document2 = $d2;
        $form->document3 = $d3;
        $form->status = 'pending';

        if($form->amount <= 14000){
            $charges = 35;
        }
        elseif($form->amount > 14000 && $form->amount <= 100000 ){
            $charges = ($form->amount / 1000) * 2.5; 
        }
        elseif($form->amount > 100000 && $form->amount <= 1000000){
            $charges = ($form->amount / 1000) * 2;
        }
        else{
            $charge = ($form->amount / 1000) * 1.75;
            $charges = ($charge < 2000 ? 2000 : $charge);  
        }
        $form->charges = $charges;
        
        if($form->save()){
            $status = '1';
            $msg = 'INR Remittance Request Form has been submitted successfully to the bank.';
            $code_short = $form->code;
            $code = "Form: $form->code has been submitted to the bank for processing. Total charges for the Remittance has amounted to Nu.$charges.The form status will be notified via SMS & email.";
            $mobile = $form->mobile_no;
            
            $this->sendEmail($form->email,$code_short);
            $this->sendSMS($mobile,$code);

            $f = Form::where('model','INRRemittance')->first();
            $role = $f->roles->role_id;
            $this->sendNotification($form,$role);
        }
        return redirect()->route('inr_remittance_form')->with(['status'=>$status, 'msg'=>$msg, 'code'=>$code]);
    }

    public function submitPrematureWithdrawalForm(Request $request){
        $request->validate([
            'Name' => 'required',
            'MobileNumber' => 'required|digits:8',
            'Email' => 'required|email',
            'IdNumber' => 'required',
            'AccountNumber' => 'required|digits:13',
            'FdRdAccountNumber' => 'required',
            'AccountType' => 'required',
            'Branch' => 'required',
            'Reason' => 'required',
            'Agreement' => 'regex:/^agree$/',
        ]);
        $status = '0';
        $code = null;
        $msg = 'Premature Withdrawal Form could not be submitted. Please try again.';
        $form = new PrematureWithdrawal;
        $form->code = 'PWF/'.date_format(Carbon::now(),'Y/m/d/His');
        $form->name = $request->Name;
        $form->mobile_no = '975'.$request->MobileNumber;
        $form->email = $request->Email;
        $form->cid = $request->IdNumber;
        $form->branch = $request->Branch;
        $form->account_number = $request->AccountNumber;
        $form->reason = $request->Reason;
        $form->feedback = $request->Feedback;
        $form->account_type = $request->AccountType;
        $form->tdrd_account_number = $request->FdRdAccountNumber;
        $form->status = 'pending';
        if($form->save()){
            $status = '1';
            $msg = 'Premature Withdrawal Form has been submitted successfully to the bank.';
            $code_short = $form->code;
            $code = "Form: $form->code has been submitted to the bank for processing. The form status will be notified via SMS & email.";
            $mobile = $form->mobile_no;

            $this->sendEmail($form->email,$code_short);
            $this->sendSMS($mobile,$code);

            $f = Form::where('model','PrematureWithdrawal')->first();
            $role = $f->roles->role_id;
            $this->sendNotification($form,$role);
        }
        return redirect()->route('gift_form')->with(['status'=>$status, 'msg'=>$msg, 'code'=>$code]);
        
    }

    public function submitGiftForm(Request $request){
    	$request->validate([
    		'Name' => 'required',
    		'AccountNumber' => 'required|digits:13',
    		'Amount' => 'required|numeric',
    		'MobileNumber' => 'required|digits:8',
    		'BeneficiaryName' => 'required',
    		'BeneficiaryAccountNumber' => 'required|numeric',
    		'AccountType' => 'required',
    		'BeneficiaryBankName' => 'required',
    		'Branch' => 'required',
    	]);

    	$status = '0';
        $code = null;
    	$msg = 'Gift Form could not be submitted. Please try again.';
    	$gift = new Gift;
    	$gift->code = 'GIFT/'.date_format(Carbon::now(),'Y/m/d/His');
    	$gift->name = $request->Name;
    	$gift->account_number = $request->AccountNumber;
    	$gift->amount = $request->Amount;
    	$gift->mobile_no = '975'.$request->MobileNumber;
    	$gift->beneficiary_name = $request->BeneficiaryName;
    	$gift->beneficiary_account_number = $request->BeneficiaryAccountNumber;
    	$gift->account_type = $request->AccountType;
    	$gift->beneficiary_bank = $request->BeneficiaryBankName;
    	$gift->branch = $request->Branch;
        $gift->status = 'pending';
    	if($gift->save()){
    		$status = '1';
    		$msg = 'Gift Form has been submitted successfully to the bank.';
            $code_short = $gift->code;
            $code = "Form: $gift->code has been submitted to the bank for processing. The form status will be notified via SMS & email.";
            $mobile = $gift->mobile_no;
            
            // $this->sendEmail($gift->email,$code_short);
            $this->sendSMS($mobile,$code);

            $f = Form::where('model','Gift')->first();
            $role = $f->roles->role_id;
            $this->sendNotification($gift,$role);
    	}
    	return redirect()->route('gift_form')->with(['status'=>$status, 'msg'=>$msg, 'code'=>$code]);
    }
}
