@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">Fixed Deposit / Fixed Deposit Plus / Recurring Deposit Closure Request (Premature/Pre-Term)</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3">
				This facility is meant for holders of BNBL Fixed Deposit/ Fixed Deposit Plus/Recurring Deposit account holders only.
				<br><br>
				Your request shall be processed only after it is validated by our operations team, by cross-checking in our systems the combination of your name, account number, mobile number, ID number and email ID. If required, you may be contacted to validate the request. Upon validation, your request will be processed and the proceeds of your deposit, along with the applicable interest if any, shall be credited to your savings account. 
				<br><br>
				You must note that the interest payable for premature closures is re-calculated , and the rate used is 1% less that the rate applicable for the period the deposit has been maintained at the bank. Example: If you opened a deposit account for 5 years at 8% per annum, but you want to close it after 1 year, the interest you get will be calculated at 5% pa (rate for 1 year being 6% per annum).
			</p>
		</div>		
	</div>
	<form action="{{route('submit_premature_withdrawal_form')}}" method="POST">
		@csrf
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
						<small class="input-description">Please enter your name exactly as in your bank account.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="MobileNumber">Your Mobile Number :</label>
						<input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Your Mobile Number." value="{{old('MobileNumber')}}">
						@error('MobileNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Email">Email Address :</label>
						<input type="email" name="Email" id="Email" class="form-control" placeholder="Your Email ID" autocomplete="off" value="{{old('Email')}}">
						@error('Email')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="IdNumber">Your ID Number :</label>
						<input type="text" name="IdNumber" id="IdNumber" class="form-control" placeholder="Your ID Number" autocomplete="off" value="{{old('IdNumber')}}">
						@error('IdNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
                        <small class="input-description">Please enter your ID registered at the bank (CID/ Work Permit/ SRP etc)</small>
					</div>

					<div class="col-md-4 mb-3">
						<label for="AccountNumber">Your Saving Account Number :</label>
						<input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Your Account Number" value="{{old('AccountNumber')}}">
						@error('AccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">
						Please enter you savings account number here. The proceeds of your deposit, along with the applicable interest, will be credited to this account.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="FdRdAccountNumber">Your FD/FD+/RD Account Number :</label>
						<input type="text" name="FdRdAccountNumber" id="Fd/RdAccountNumber" class="form-control" autocomplete="off" placeholder="FD/FD+/RD Account Number" value="{{old('FdRdAccountNumber')}}">
						@error('FdRdAccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
						<small class="input-description">Please enter your BNB FD/FD+/RD account number correctly here.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountType">Account Type :</label>
						<select class="form-control" name="AccountType" id="AccountType">
							<option value="">Choose</option>
							<option {{old('AccountType') == 'Fixed Deposit' ? 'selected': ''}}>Fixed Deposit</option>
							<option {{old('AccountType') == 'Fixed Deposit Plus' ? 'selected': ''}}>Fixed Deposit Plus</option>
							<option {{old('AccountType') == 'Recurring Deposit' ? 'selected': ''}}>Recurring Deposit</option>
						</select>
						@error('AccountType')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Branch">Branch :</label>
						<select class="form-control" name="Branch" id="Branch">
							<option value="">Choose</option>
							@foreach($branches as $b)
								<option {{ $b->branch_name == old('Branch') ? 'selected':'' }}>{{$b->branch_name}}</option>
							@endforeach
						</select>
						@error('Branch')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
                        <small class="input-description">Please select the branch where your account is maintained.</small>
					</div>
					<div class="col-md-6 mb-3">
						<label for="Reason">Reason for Closure :</label>
						<input type="text" name="Reason" id="Reason" class="form-control" placeholder="Reason for Closure" autocomplete="off" value="{{old('Reason')}}">
						@error('Reason')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
                        <small class="input-description">Please write here the reason you want to close your deposit account.</small>
					</div>
					<div class="col-md-6 mb-3">
						<label for="Feedback">Your Feedback? :</label>
						<input type="text" name="Feedback" id="Feedback" class="form-control" placeholder="Any Feedback.." autocomplete="off" value="{{old('Feedback')}}">
						@error('Feedback')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
                        <small class="input-description">Please let us know how we can help you in managing your deposits better.</small>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mb-3">
						<div class="inner-footer">
							<h5 class="text-bnb-b"><b>Indemnity</b></h5>
							<p>By clicking on the submit button, I hereby confirm that all the details entered by me are correct, and based on this submission, I hereby authorize the bank to close my FD/RD account mentioned above and credit the proceeds to my Savings Account.</p>

							<p>I also agree that the transaction carried out by the bank based on the details as submitted is acceptable to me, and I shall be solely responsible in case the details provided by me are wrong and the transaction is processed into a wrong account.</p>

							<p>Submission of this form to the Bhutan National Bank shall be treated as equivalent to you physically submitting an account closure form to the bank.</p>

							<p>Please note that the transaction shall be processed only if you completed the form properly and attached the required documents, before choosing "I Agree" to submit this form.</p>
							<div class="row">
								<div class="col-6 text-center">
									<input type="radio" id="agree" name="Agreement" class="form-control" value="agree"> <label for="agree">I Agree</label>
								</div>
								<div class="col-6 text-center">
									<input type="radio" id="disagree" name="Agreement" class="form-control" checked="checked" value="disagree"><label for="disagree">I Disagree</label>
								</div>
								@error('Agreement')
		                            <span class="bnb-error m-auto">
		                                <small><strong>We cannot process your request if you do not agree to the Indemnity clause.</strong></small>
		                            </span>
		                            <br>
		                        @enderror
							</div>
						</div>

					</div>	
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