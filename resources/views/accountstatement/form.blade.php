@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<h3 class="form-title text-center">Get Your Account Statement</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
	        <form action="{{route('account_statement_form_path')}}" method="POST">
			@csrf
				<div class="row mt-5">	
					<div class="col-md-6 mb-3">
						<label for="AccountNumber">Saving Account Number :</label>
						<input type="text" name="AccountNumber" id="AccountNumber" class="form-control" autocomplete="off" placeholder="Account Number" value="{{old('AccountNumber')}}">
						@error('AccountNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="MobileNumber">Mobile Number :</label>
						<input type="text" name="MobileNumber" id="MobileNumber" class="form-control" autocomplete="off" placeholder="Mobile Number" value="{{old('MobileNumber')}}">
						@error('MobileNumber')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>

					<div class="col-md-6 mb-3">
						<label for="FromDate">From Date :</label>
						<input type="date" name="FromDate" id="FromDate" class="form-control" autocomplete="off" placeholder="Account Number" value="{{old('FromDate')}}">
						@error('FromDate')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					
					<div class="col-md-6 mb-3">
						<label for="ToDate">To Date :</label>
						<input type="date" name="ToDate" id="ToDate" class="form-control" autocomplete="off" placeholder="Account Number" value="{{old('ToDate')}}">
						@error('ToDate')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 mb-3">
						<div class="inner-footer">
							<h5 class="text-bnb-b"><b>Indemnity</b></h5>
							<p>By clicking on the submit button, I hereby confirm that all the details entered by me are correct.</p>

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
			</form>
		</div>		
	</div>
@endsection