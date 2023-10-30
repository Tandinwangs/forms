<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNewUser(Request $request){
        $request->validate([
                'name'=>'required|regex:/[a-zA-Z ]/',
                'username'=>'required|unique:users,username|regex:/[a-zA-Z0-9_]/',
                'email'=>'required|unique:users,email',
                'mobile'=>'required|unique:users,mobile',
                'password'=>'required|confirmed',
                'role'=>'required'
        ]);
        $status = '0';
        $msg = "User could not be saved. Please try again";
        $user = new User;
        $user->name = $request->name;
        $user->username =$request->username;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->password=bcrypt($request->password);
        $user->role_id=$request->role;
        $user->branch_id=$request->branch;
        if($user->save())
        {
                $status='1';
                $msg='User has been added successfully.';
        }
        return redirect()->route('add_user_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function updateUser(Request $request){
        $request->validate([
            'name'=>'required|regex:/[a-zA-Z ]/',
            'username'=>'required|unique:users,username,'.$request->user_id.'|regex:/[a-zA-Z0-9_]/',
            'email'=>'required|unique:users,email,'.$request->user_id,
            'mobile'=>'required|unique:users,mobile,'.$request->user_id,
            'password'=>'nullable|confirmed',
            'role'=>'nullable'
        ]);
        $status = '0';
        $msg = "User could not be updated. Please try again";
        $user = User::findorfail($request->user_id);
        $user->name = $request->name;
        $user->username =$request->username;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->branch_id=$request->branch;
        if(!blank($request->password))
        {
            $user->password=bcrypt($request->password);
        }
        if(!blank($request->role))
        {
            $user->role_id=$request->role;
        }
        if($user->save())
        {
            $status='1';
            $msg='User has been updated successfully.';
        }
        return redirect()->route('users_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function changePassword(Request $request){
        $request->validate([
            'currentpassword'=>'required',
            'password'=>'required|confirmed'
        ]);
        $status = '0';
        $msg = 'Current Password did not match the correct password. Please try again.';
        $route = 'change_password_path';
        if(Hash::check($request->currentpassword,Auth::user()->password)){
            $user = User::findorfail(Auth::id());
            $user->password = bcrypt($request->password);
            if($user->save()){
                $status = '1';
                $msg = 'Password has been changed successfully.';
                $route = 'dashboard_path';
            }
        }
        return redirect()->route($route)->with(['status'=>$status,'msg'=>$msg]);
    }
}