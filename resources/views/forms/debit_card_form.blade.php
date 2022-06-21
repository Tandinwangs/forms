@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">Bhutan National Bank Debit Card Application Form</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3">
				I would like to request BNB to kindly issue me a new ATM/Debit Card against my following account number maintained with your bank. 
			</p>
			<p class="form-description-raleway">	
				The request shall be processed only after validating your request, by verifying in our systems the combination of your name, account number, mobile number, ID number and email ID. If required, you may be contacted to validate the request.
			</p>

			<p class="form-description-raleway" style="color:white; background:#26578C; border-radius:10px;">	
				<small>RuPay cards are issued over the counter at any of our branches/ extension offices. If you are in Bhutan, please visit one of our branch/ extension offices to apply for & collect one - it will be faster than applying online.</small>	
			</p>
		</div>		
	</div>
	<form action="{{route('debit_card_form')}}" method="POST">
		@csrf
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row">	
					<div class="col-md-4 mb-3">
						<label for="CardType">Type of Debit Card :</label>
						<select class="form-control" name="CardType" id="CardType">
							<option value="">Choose the Debit Card Type</option>
							<!-- <option value="Proprietary Card" {{old('CardType')=='Proprietary Card'?'selected':''}}>Proprietary Card</option> -->
							<option value="VISA Debit Card" {{old('CardType')=='VISA Debit Card'?'selected':''}}>VISA Debit Card</option>
							<option value="RuPay Card" {{old('CardType')=='RuPay Card' ? 'selected':''}}>RuPay Card</option>
						</select>
						@error('CardType')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="RequestFor">Request For :</label>
						<select class="form-control" name="RequestFor" id="RequestFor">
							<option value="">Choose</option>
							<option value="New Card" {{old('RequestFor')=='New Card'?'selected':''}}>New Card</option>
							<option value="Replacement" {{old('RequestFor')=='Replacement'?'selected':''}}>Replacement</option>
						</select>
						@error('RequestFor')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Branch">I will collect the card from:</label>
						<select class="form-control" name="Branch" id="Branch">
							<option value="">Location to Collect Your Card</option>
							@foreach($branches as $b)
								<option {{ $b->branch_name == old('Branch') ? 'selected':'' }}>{{$b->branch_name}}</option>
							@endforeach
						</select>
						@error('Branch')
                            <span class="bnb-error">
                                <small><strong>Please select the location from where you will collect your card.</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="NameOnCard">Name on Card :</label>
						<input type="text" name="NameOnCard" id="NameOnCard" class="form-control" autocomplete="off" placeholder="Name on Card" value="{{old('NameOnCard')}}">
						@error('NameOnCard')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">Name to be printed on the card. Maximum of 20 characters.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountNumber">Your Account Number :</label>
						<input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Your Account Number" value="{{old('AccountNumber')}}">
						@error('AccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">Please enter your BNB account number correctly here.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountType">Account Type :</label>
						<select class="form-control" name="AccountType" id="AccountType">
							<option value="">Choose the Account Type</option>
							<option value="Savings Account" {{old('AccountType')=='Savings Account'?'selected':''}}>Savings Account</option>
							<option value="Current Account" {{old('AccountType')=='Current Account'?'selected':''}}>Current Account</option>
						</select>
						@error('AccountType')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="ReasonForReplacement">Reason for Replacement:</label>
						<textarea name="ReasonForReplacement" id="ReasonForReplacement" rows="1" class="form-control">{{old('ReasonForReplacement')}}</textarea>
						@error('ReasonForReplacement')
							<span class="bnb-error m-auto">
								<small><strong>{{$message}}</strong></small>
							</span>
							<br>
						@enderror
						<small class="input-description">Required if you are requesting for replacement.</small>
					</div>	
				</div>
			</div>		
		</div>

		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="Name">Your Full Name :</label>
							<input type="text" name="Name" id="Name" class="form-control" autocomplete="off" placeholder="Your Full Name" value="{{old('Name')}}">
							@error('Name')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="CID">Your CID Number:</label>
							<input type="text" name="CID" id="CID" class="form-control" autocomplete="off" placeholder="CID Number" value="{{old('CID')}}">
							@error('CID')
								<span class="bnb-error">
									<small><strong>The CID Number field is required.</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="Nationality">Nationality:</label>
							<input type="text" name="Nationality" id="Nationality" class="form-control" autocomplete="off" placeholder="Your Nationality" value="{{old('Nationality')}}">
							@error('Nationality')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="MobileNumber">Your Mobile Number:</label>
							<input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Your Mobile Number" value="{{old('MobileNumber')}}">
							@error('MobileNumber')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="Email">Your Email ID:</label>
							<input type="text" name="Email" id="Email" class="form-control" autocomplete="off" placeholder="Your Email ID" value="{{old('Email')}}">
							@error('Email')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="DoB">Your Date of Birth:</label>
							<input type="date" name="DoB" id="DoB" class="form-control" autocomplete="off" placeholder="Your Date of Birth" value="{{old('DoB')}}">
							@error('DoB')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
								<br>
							@enderror
						</div>
						<div class="col-md-6 mb-3">
							<label for="PresentAddress">Your Present Address:</label>
							<textarea name="PresentAddress" id="PresentAddress" rows="1" class="form-control">{{old('PresentAddress')}}</textarea>
							@error('PresentAddress')
								<span class="bnb-error m-auto">
									<small><strong>{{$message}}</strong></small>
								</span>
								<br>
							@enderror
							<small class="input-description">Your present address, gewog and dzongkhag.</small>
						</div>
					</div>
				</div>
			</div>

		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row mb-3">
					<div class="inner-footer">
						<h5 class="text-bnb-b"><b>Indemnity</b></h5>
						<p class="form-description-raleway">I hereby declare that the information given above is true and correct and would like to request the Bank to update my above details in your system. I also hereby authorize the Bank to deduct any applicable charges related to the issuance of this card.</p>
						
						<div class="row">
							<div class="col-6 text-center">
								<input type="radio" id="agree" name="Agreement" class="form-control" value="agree"> <label for="agree">I Agree</label>
							</div>
							<div class="col-6 text-center">
								<input type="radio" id="disagree" name="Agreement" class="form-control" checked="checked" value="disagree"><label for="disagree">I Disagree</label>
							</div>
							@error('Agreement')
								<br>
								<span class="bnb-error m-auto">
									<small><strong>We cannot process your request if you do not agree to the Indemnity clause.</strong></small>
								</span>
								<br>
							@enderror
						</div>
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