<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPSent;
use App\Mail\PasswordReset;



class AdminViewBeforeLoginController extends Controller
{
   	public function getLoginForm(){
    	return view('admin.login');
    }

    public function getOTPForm(Request $request){
    	$user = null;
    	if($request->action == 'reset'){
    		$key = 'user';
    	}
    	else{
    		$key = 'otp';
    		$user = $request->userid;
    	}
    	return view('admin.otp',compact('key','user'));
    }

    public function verifyUserName(Request $request){
    	$request->validate([
    		'username' => 'required',
    	]);
    	$status = '0';
    	$action = 'reset';
    	$usr = null;
    	$msg = 'No user was found matching the provided username. Please Try Again.';
    	$user = User::where('username',$request->username)->first();
    	
    	if(!blank($user))
    	{
    		$otp = mt_rand(100000,999999);
    		$user->otp = $otp;
    		$user->otp_gen_time = Carbon::now();
    		if($user->save())
    		{
    			$action = 'otp';
    			$usr = $user->id;
    			$status = '1';
    			$msg = 'OTP has been sent to your email.';
    			Mail::to($user->email)->send(new OTPSent($otp,$usr));
    		}
    	}

    	return redirect()->route('otp_path',['action'=>$action,'userid'=>$usr])->with(['status'=>$status, 'msg'=>$msg]);
    }

    public function verifyOTP(Request $request){
    	$request->validate([
    		'otp'=>'array|min:6',
    		"otp.*"=>'required|numeric',
    	]);
    	$status = '0';
    	$msg = 'Password couldnot be reset. Please try again.';
    	$user = User::find($request->userid);
    	if($user->count < 3){
    		$otp_time = new Carbon($user->otp_gen_time);
    		if(date_diff(Carbon::now(),$otp_time)->format('%D:%H:%I:%S') < '00:00:10:01'){
    			if(implode($request->otp) == $user->otp)
    			{
    				$random = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()');
					$password = substr($random, 0, 15);
    				$user->otp = null;
		    		$user->otp_gen_time = null;
		    		$user->count = 0;
		    		$user->password = bcrypt($password);
		    		$user->save();
    				Mail::to($user->email)->send(new PasswordReset($password));
    				if($user->save()){
			            $status = '1';
			            $msg = 'Password has been reset successfully. Please login with the new password';
			        }
			  
			        return redirect()->route('login')->with(['status'=>$status,'msg'=>$msg]);

    			}
    			else{
    				$user->count = $user->count+1;
    				$user->save();
    				$msg = "Incorrect OTP entered. Please try again.";
    				return redirect()->route('otp_path',['action'=>'otp','userid'=>$user->id])->with(['status'=>$status, 'msg'=>$msg]);
    			}
    		}
    		else{
    			$user->otp = null;
	    		$user->otp_gen_time = null;
	    		$user->count = 0;
	    		$user->save();
	    		$msg = "OTP validity time exceeded.";
	    		return redirect()->route('otp_path',['action'=>'reset','userid'=>$user->id])->with(['status'=>$status,'msg'=>$msg]);
    		}
    	}
    	else{
    		$user->otp = null;
    		$user->otp_gen_time = null;
    		$user->count = 0;
    		$user->save();
    		$msg = 'Multiple incorrect OTPs tried. Please regenerate a new OTP.';
    		return redirect()->route('otp_path',['action'=>'reset','userid'=>$user->id])->with(['status'=>$status,'msg'=>$msg]);
    	}
    }
}
