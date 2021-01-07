<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleAndForm;

class RolesAndFormsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function linkForm(Request $request){
    	$status = '0';
    	$msg = 'Role and Form could not be linked.';
    	$link = new RoleAndForm;
    	$link->role_id = $request->role_id;
    	$link->form_id = $request->form_id;
    	if($link->save()){
    		$status = '1';
    		$msg = 'Role and Form has been linked successfully.';
    	}
    	return redirect()->route('rolesandforms_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function unlinkForm(Request $request){
    	$status = '0';
    	$msg = 'Role and Form could not be unlinked.';
    	$link = RoleAndForm::findorfail($request->link_id);
    	if(!blank($link)){
    		if($link->delete()){
	    		$status = '1';
	    		$msg = 'Role and Form has been un-linked successfully.';
    		}
    	}
    	return redirect()->route('rolesandforms_path')->with(['status'=>$status,'msg'=>$msg]);
    }
}
