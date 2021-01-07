<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addNewForm(Request $request){
    	$request->validate([
    		'form'=>'required',
    		'description'=>'required',
    		'model'=>'required',
            'form_path'=>'required',
            'client_path'=>'required',
    	]);
    	$status = '0';
    	$msg = 'Form could not be added. Please try again.';
    	$form = new Form;
    	$form->form = $request->form;
    	$form->description = $request->description;
    	$form->model = $request->model;
        $form->form_path = $request->form_path;
        $form->client_path = $request->client_path;
    	if($form->save()){
    		$status ='1';
    		$msg = 'Form has been added successfully.';
    	}
    	return redirect()->route('add_form_path')->with(['status'=>$status,'msg'=>$msg]);
    }

    public function updateForm(Request $request){
    	$request->validate([
    		'form'=>'required',
    		'description'=>'required',
    		'model'=>'required',
            'form_path'=>'required',
            'client_path'=>'required',
    	]);
    	$status = '0';
    	$msg = 'Form could not be updated. Please try again.';
    	$form = Form::findorfail($request->form_id);
    	if(!blank($form)){
	    	$form->form = $request->form;
	    	$form->description = $request->description;
	    	$form->model = $request->model;
            $form->form_path = $request->form_path;
            $form->client_path = $request->client_path;
	    	if($form->save()){
	    		$status ='1';
	    		$msg = 'Form has been updated successfully.';
	    	}
    	}
    	return redirect()->route('add_form_path')->with(['status'=>$status,'msg'=>$msg]);
    }
}
