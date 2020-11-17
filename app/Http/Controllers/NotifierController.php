<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifier;

class NotifierController extends Controller
{
   	public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateNotifier(Request $request){
    	$request->validate([
    		'Email'=>'nullable|email',
    		'MailKey'=>'required_with:Email',
    		'SmsApi'=>'required',
    	]);

    	$msg = "Notifier could not be updated. Please try again.";
    	$status = '0';
    	$notifier = Notifier::first();
    	$notifier->email = $request->Email;
    	$notifier->mail_key = $request->MailKey;
    	$notifier->sms_api = $request->SmsApi;
    	if($notifier->save())
    	{
    		$status = '1';
    		$msg = 'Notifier has been updated successfully.';
    	}
    	return redirect()->route('notifiers_path')->with(['status'=>$status,'msg'=>$msg]);
    }
}
