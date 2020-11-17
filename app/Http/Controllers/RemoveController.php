<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Form;

class RemoveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function removeComponents(Request $request){
    	$status = '0';
    	$msg = 'Delete operation failed. Please try again.';
    	$route = 'dashboard_path';
    	if($request->category == 'role')
    	{
    		$result = Role::find($request->id);
    		if($result->delete()){
    			$status = '1';
    			$msg = 'Role has been deleted successfully.';
    			$route = 'add_role_path';
    		}
    	}
    	elseif ($request->category == 'user') {
    		$result = User::find($request->id);
    		if($result->delete()){
    			$status = '1';
    			$msg = 'User has been deleted successfully.';
    			$route = 'users_path';
    		}	
    	}
    	elseif ($request->category == 'form') {
    		$result = Form::find($request->id);
    		if($result->delete()){
    			$status = '1';
    			$msg = 'Form has been deleted successfully.';
    			$route = 'add_form_path';
    		}	
    	}
    	else{
    		return "ERROR";
    	}
    	return redirect()->route($route)->with(['status'=>$status,'msg'=>$msg]);

    }
}
