@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">Global Interchange for Financial Transaction (GIFT) Form</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3">
				This funds transfer transaction is solely affected based on the account number of the beneficiary and amounts furnished by you on this form. The bank shall not be held liable for any incorrect details that you have provided on the form, and the transaction shall be affected at your sole risk & responsibility.
			</p>
		</div>		
	</div>
	<form action="{{route('submit_gift_form')}}" method="POST">
		@csrf
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				
				<div class="row">	
					<div class="col-md-4 mb-3">
						<label for="Name">Your Full Name :</label>
						<input type="text" name="Name" id="Name" class="form-control" autocomplete="off" placeholder="Your Full Name" value="{{old('Name')}}" required="required">
						@error('Name')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">Please enter your name exactly as in your bank account.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountNumber">Your Account Number :</label>
						<input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Your Account Number" value="{{old('AccountNumber')}}" required="required">
						@error('AccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">
						Please enter your BNB account number correctly here.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="Amount">Amount to be Transferred (in Nu.) :</label>
						<input type="text" name="Amount" id="Amount" class="form-control" autocomplete="off" placeholder="Amount to be Transferred" value="{{old('Amount')}}" required="required">
						@error('Amount')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">Please enter the amount to be transferred.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="MobileNumber">Your Mobile Number :</label>
						<input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Your Mobile Number." value="{{old('MobileNumber')}}" required="required">
						@error('MobileNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Branch">Home Branch :</label>
                        <select class="form-control" name="Branch" id="Branch" required="required">
							<option value="">Choose</option>
							@foreach($branches as $b)
								<option {{$b->branch_name == old('Branch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
							@endforeach
						</select>
						@error('Branch')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
				</div>
			</div>		
		</div>
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row mb-3">
					<div class="col-12">
						<h5 class="text-bnb-b"><b>Beneficiary Information</b></h5>
					</div>	
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryName">Beneficiary Name :</label>
						<input type="text" name="BeneficiaryName" id="BeneficiaryName" class="form-control" autocomplete="off" placeholder="Beneficiary Name" value="{{old('BeneficiaryName')}}" required="required">
						@error('BeneficiaryName')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryAccountNumber">Beneficiary Account Number :</label>
						<input type="text" name="BeneficiaryAccountNumber" id="BeneficiaryAccountNumber" class="form-control" autocomplete="off" placeholder="Beneficiary Account Number" value="{{old('BeneficiaryAccountNumber')}}" required="required">
						@error('BeneficiaryAccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountType">Account Type :</label>
						<input type="text" name="AccountType" id="AccountType" class="form-control" autocomplete="off" placeholder="Account Type" value="{{old('AccountType')}}" required="required">
						@error('AccountType')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description" autocomplete="off">Saving / Current / Over Draft / Loan/Others (Specify)</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryBankName">Beneficiary Bank Name :</label>
						<select class="form-control" name="BeneficiaryBankName" id="BeneficiaryBankName" required="required">
							<option value="">Choose</option>
							<option {{old('BeneficiaryBankName') == 'BOBL' ? 'selected': ''}}>BOBL</option>
							<option {{old('BeneficiaryBankName') == 'BDBL' ? 'selected': ''}}>BDBL</option>
							<option {{old('BeneficiaryBankName') == 'TBank' ? 'selected': ''}}>TBank</option>
							<option {{old('BeneficiaryBankName') == 'DPNB' ? 'selected': ''}}>DPNB</option>
						</select>
						@error('BeneficiaryBankName')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryBranch">Beneficiary Branch :</label>
                        <input type="text" name="BeneficiaryBranch" id="BeneficiaryBranch" class="form-control">
						@error('BeneficiaryBranch')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection