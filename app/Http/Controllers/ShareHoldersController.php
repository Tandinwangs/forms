<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShareHolder;

class ShareHoldersController extends Controller
{
    public function getShareHolderInfo () {
        return view('forms.share_holder_search_form');
    }

    public function searchShareHolderInfo (Request $request) {
        $request->validate([
            'search_parameter' => 'required'
        ]);
        $shareholder = ShareHolder::where('cid',$request->search_parameter)->orWhere('cd_code',$request->search_parameter)->first();
        if(blank($shareholder)){
            $shareholder = 'no-record';
        }
        return view('forms.share_holder_information_form', compact('shareholder'));
    }

    public function updateShareHolderInfo (Request $request) {
        $request->validate([
            'tpn' => 'nullable',
            'address' => 'required|max:2000',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'mobile_number' => 'required',
        ]);

        $status ='0';
        $msg = 'Share information could not be updated. Please try again.';

        $shareholder = ShareHolder::where(['cid'=>$request->cid, 'cd_code'=>$request->cd_code])->first();
        $shareholder->bank_account = $request->bank_account;
        $shareholder->bank_name = $request->bank_name;
        $shareholder->phone = $request->mobile_number;
        $shareholder->address = $request->address;
        $shareholder->tpn = $request->tpn;
        $shareholder->status = 'updated';
        if($shareholder->save()){
            $status = '1';
            $msg = "$shareholder->name's information has been successfully updated in the system. Thank you for your time.";
        }
        return redirect()->route('share_holder_information_form')->with(['status'=>$status, 'msg'=>$msg]);
    }
}
