@extends('master.master')
@section('content')
    <div class="row">
        <div class="container-flexible bnb-border mb-2 p-5 form-description text-center">
                @if(!blank($shareholder))
                    @if($shareholder == 'no-record')
                        <h4 class="mt-5 bnb-btn-y">
                            No Record Found!
                        </h4>
                        <p>This means either your information is up to date and you are not required to update your information or search parameter you provided doesnot exist in our system.</p>
                        <div class="col-4 offset-md-4">
                            <a href="{{route('share_holder_information_form')}}" class="bnb-btn-b">Back to Search Parameter</a>
                        </div>
                    @else
                        <div class="text-center">
                            @if($shareholder->status == 'not-updated')
                                <h4><span class="bnb-error">Information Not Updated</span></h4>
                                <p>Please fill in your information to update.</p>
                            @else
                                <h4><span class="bnb-b-span">Information Updated</span></h4>
                            @endif
                            
                            <form action="{{ route('update_share_holder_information') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label>CD Code :</label>
                                        <div class="form-control">{{$shareholder->cd_code}}</div>
                                        <input type="hidden" name="cd_code" value="{{$shareholder->cd_code}}">
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label>Share Holder Name :</label>
                                        <div class="form-control">{{$shareholder->name}}</div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label>CID Number :</label>
                                        <div class="form-control">{{$shareholder->cid}}</div>
                                        <input type="hidden" name="cid" value="{{$shareholder->cid}}">
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label for="tpn">TPN Number :</label>
                                        <input type="text" name="tpn" id="tpn" class="form-control" autocomplete="off" placeholder="TPN Number" value="{{$shareholder->tpn}}" >
                                        @error("tpn")
                                            <span class="bnb-error">
                                                <small><strong>{{ $message }}</strong></small>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label for="address">Address :</label>
                                        <textarea type="text" name="address" id="address" class="form-control" autocomplete="off"  rows="1">{{$shareholder->address}}</textarea>
                                        @error("address")
                                            <span class="bnb-error">
                                                <small><strong>{{ $message }}</strong></small>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label for="mobile_number">Mobile Number :</label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" autocomplete="off" placeholder="Mobile Number" value="{{$shareholder->phone}}" >
                                        @error("mobile_number")
                                            <span class="bnb-error">
                                                <small><strong>{{ $message }}</strong></small>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label for="bank_account">Bank Account Number :</label>
                                        <input type="text" name="bank_account" id="bank_account" class="form-control" autocomplete="off" placeholder="Bank Account Number" value="{{$shareholder->bank_account}}" >
                                        @error("bank_account")
                                            <span class="bnb-error">
                                                <small><strong>{{ $message }}</strong></small>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 bnb-text-left">
                                        <label for="bank_name">Bank :</label>
                                        <select name="bank_name" id="bank_name" class="form-control">
                                            <option {{$shareholder->bank_name=='' ? 'selected':''}} value="">Select Bank</option>
                                            <option {{$shareholder->bank_name=='Bhutan National Bank Limited' ? 'selected':''}} value="Bhutan National Bank Limited">Bhutan National Bank Limited</option>
                                            <option {{$shareholder->bank_name=='Bank of Bhutan' ? 'selected':''}} value="Bank of Bhutan">Bank of Bhutan</option>
                                            <option {{$shareholder->bank_name=='TBank' ? 'selected':''}} value="TBank">TBank</option>
                                            <option {{$shareholder->bank_name=='Bhutan Development Bank Limited' ? 'selected':''}} value="Bhutan Development Bank Limited">Bhutan Development Bank Limited</option>
                                            <option {{$shareholder->bank_name=='Druk Punjab National Bank' ? 'selected':''}} value="Druk Punjab National Bank">Druk Punjab National Bank</option>
                                        </select>
                                        @error("bank_name")
                                            <span class="bnb-error">
                                                <small><strong>{{ $message }}</strong></small>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>  
                                </div>
                        
                                <button type="submit" class="btn btn-primary mt-3">
                                    Update Information
                                </button>
                            </form>
                        </div>
                    @endif
                @endif
        </div>
    </div>
@endsection