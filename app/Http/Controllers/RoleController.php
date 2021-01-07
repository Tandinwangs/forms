<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addNewRole(Request $request){
    	$status = '0';
    	$msg = 'Role could not be saved. Please try again.';
    	$role = new Role;
    	$role->role = $request->role;
    	$role->description = $request->role_description;
    	if($role->save()){
    		$status = '1';
    		$msg = 'Role has been added Successfully.';
    	}
    	return redirect()->route('add_role_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function updateRole(Request $request){
        $status = '0';
        $msg = 'Role could not be updated. Please try again.';
        $role = Role::findorfail($request->role_id);
        if(!blank($role)){
            $role->role = $request->role;
            $role->description = $request->role_description;
            if($role->save()){
                $status = '1';
                $msg = 'Role has been updated Successfully.';
            }
        }
        return redirect()->route('add_role_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function removeRole(Request $request){
        return $request->all();
    }
}
