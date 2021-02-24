<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrematureWithdrawal;
use App\INRRemittance;
use App\DebitCardRequest;
use App\RoleAndForm;
use App\User;
use App\Gift;
use App\Form;
use App\Role;
use App\Branch;
use App\Notifier;
use Auth;

class AdminViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function authUser(){
		return Auth::user();
	} 

    public function getDashboard(){
        $user = $this->authUser();
        $active = 'db';
        $gifts = Gift::when($user, function($query, $user){
                                if($user->role->role !="Administrator" && $user->role->role !="Monitor"){
                                    $query->where('branch',$user->branch->branch_name);
                                }
                                return $query;
                            })
                            ->where('status','pending')->orderBy('id','desc')->take('5')->get();

        $premature = PrematureWithdrawal::when($user, function($query, $user)
                                {
                                    if($user->role->role !="Administrator" && $user->role->role !="Monitor"){
                                        $query->where('branch',$user->branch->branch_name);
                                    }
                                    return $query;
                                })
                                ->where('status','pending')->orderBy('id','desc')->take('5')->get();

        $remittance = INRRemittance::when($user, function($query, $user){
                                if($user->role->role !="Administrator" && $user->role->role !="Monitor"){
                                    $query->where('homebranch',$user->branch->branch_name);
                                }
                                return $query;
                            })
                        ->where('status','pending')->orderBy('id','desc')->take('5')->get();

        $debitcards = DebitCardRequest::when($user, function($query, $user){
                                if($user->role->role !="Administrator" && $user->role->role !="Monitor"){
                                    $query->where('branch',$user->branch->branch_name);
                                }
                                return $query;
                            })
                        ->where('status','pending')->orderBy('id','desc')->take('5')->get();
                        
        if($user->role->role == 'Administrator' || $user->role->role == 'Monitor')
        {
            $form_id = Form::pluck('id');
        }
        else{
            $form_id = $user->role->forms->pluck('form_id');               
        }
        $forms = Form::whereIn('id',$form_id)->get();
    	return view('admin.dashboard',compact('user','active','forms','gifts','premature','remittance','debitcards'));
    }

    public function getForms(){
        $active = 'f';
        $user = $this->authUser();
        if($user->role->role == 'Administrator' || $user->role->role == 'Monitor')
        {
            $forms = Form::all();
        }
        else{
            $forms = $user->role->forms;               
        }
        return view('admin.forms',compact('user','active','forms'));
    }

    public function getRolesAndForms(){
    	$active = 'raf';
    	$user = $this->authUser();
        $rafs = Role::all();
        $lfs = RoleAndForm::distinct('form_id')->pluck('form_id');
        //$forms = Form::whereNotIn('id',$lfs)->get();
        $forms = Form::all();
    	return view('admin.rolesandforms',compact('user','active','rafs','forms'));
    }

    public function getUsers(){
    	$active = 'u';
    	$user = $this->authUser();
    	$users = User::all();
    	return view('admin.users',compact('user','users','active'));
    }

    public function getAddUserForm(){
    	$active = 's';
    	$user = $this->authUser();
        $roles = Role::all();
        $key = 'view';
        $branches = Branch::all();
    	return view('admin.adduser',compact('user','active','roles','key','branches'));
    }

    public function getEditUserForm(Request $request){
        $usr = User::findorfail($request->user_id);
        $key = 'edit';
        $roles = Role::all();
        $active = 'u';
        $user = $this->authUser();
        $branches = Branch::all();
        return view('admin.adduser',compact('key','roles','active','user','usr','branches'));
    }

    public function getAddRoleForm(){
    	$active = 's';
        $key = 'view';
    	$user = $this->authUser();
    	$roles = Role::all();
    	return view('admin.addrole',compact('user','active','roles','key'));
    }

    public function getEditRoleForm(Request $request){
        $role = Role::findorfail($request->role_id);
        $key = 'edit';
        $active = 's';
        $user = $this->authUser();
        return view('admin.addrole',compact('key','role','active','user'));
    }

    public function getAddFormForm(){
    	$active = 's';
        $key = 'view';
    	$user = $this->authUser();
        $forms = Form::all();
    	return view('admin.addform',compact('user','active','forms','key'));
    }

    public function getEditFormForm(Request $request){
        $form = Form::findorfail($request->form_id);
        $key = 'edit';
        $active = 's';
        $user = $this->authUser();
        return view('admin.addform',compact('key','form','active','user'));
    }

    public function getChangePasswordForm(Request $request){
    	$active = "0";
    	$user = $this->authUser();
    	return view('admin.changepassword',compact('user','active'));
    }

    public function getNotifiers(){
        $key = 'view';
        $notifiers = Notifier::all();
        $active = 's';
        $user = $this->authUser();
        return view('admin.notifiers',compact('notifiers','active','user','key'));
    }

    public function getEditNotifiers(){
        $key = 'edit';
        $notifiers = Notifier::first();
        $active = 's';
        $user = $this->authUser();
        return view('admin.notifiers',compact('notifiers','active','user','key'));
    }
}
