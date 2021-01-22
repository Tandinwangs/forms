@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">INR Remittance Request Form</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3">
				This facility is meant for BNBL account holders only.
			
			</p>
			<p class="form-description-raleway">	
				The request shall be processed only after validating your request, by verifying in our systems the combination of your name, account number, mobile number, ID number and email ID. If required, you may be contacted to validate the request.
			</p>
		</div>		
	</div>
	<form  method="POST" action="{{route('submit_inr_remittance_form')}}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row">
					<div class="col-md-4 mb-3">
						<label for="Name">Your Full Name:</label>
						<input type="text" name="Name" id="Name" class="form-control" placeholder="Your Full Name" required="required" value="{{old('Name')}}" autocomplete="off">
						<small class="input-description">Please enter your name exactly as in your bank account.</small>
						@error('Name')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="IDNumber">Your ID Number:</label>
						<input type="text" name="IDNumber" id="IDNumber" class="form-control" placeholder="Your ID Number" required="required" value="{{old('IDNumber')}}" autocomplete="off">
						<small class="input-description">Please enter your ID registered at the bank (CID/ Work Permit/ SRP etc)</small>
						@error('IDNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="MobileNumber">Your Mobile Number:</label>
						<input type="text" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Your Mobile Number" required="required" value="{{old('MobileNumber')}}" autocomplete="off">
						<small class="input-description">Please enter the mobile number (as registered at the bank).</small>
						@error('MobileNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Email">Email Address:</label>
						<input type="email" name="Email" id="Email" class="form-control" placeholder="Your Email ID" required="required" autocomplete="off" value="{{old('Email')}}">
						@error('Email')
							<br>
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
				
				<div class="row">	
					<div class="col-md-4 mb-3">
						<label for="Amount">Remittance Amount :</label>
						<input type="amount" name="Amount" id="Amount" class="form-control" placeholder="Remittance Amount" required="required" autocomplete="off" value="{{old('Amount')}}">
						<small class="input-description">Please enter the amount to be remitted. There will be certain bank charges for the remittance, which will be added to the amount you enter, while debiting from your account.</small>
						@error('Amount')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="HomeBranch">In which branch did you open your account?</label>
						<select class="form-control" name="HomeBranch" id="HomeBranch" required="required">
							<option value="">Choose</option>
							@foreach($branches as $b)
								<option {{$b->branch_name == old('HomeBranch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
							@endforeach
						</select>
						@error('HomeBranch')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
                        <small class="input-description">Please select the branch where your account is maintained.</small>
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountNumber">Your Account Number:</label>
						<input type="text" name="AccountNumber" id="AccountNumber" class="form-control" placeholder="Your Account Number" required="required" value="{{old('AccountNumber')}}" autocomplete="off">
						<small class="input-description">Please enter your BNB account number correctly here. The amount for remittance (+ charges, if applicable) shall be debited from this account.</small>
						@error('AccountNumber')
							<br>
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
				<div class="row">
					<div class="col-md-5 mb-3">
						<label for="CurrentAddress">Your Current Address (In Bhutan):</label>
						<input type="text" name="CurrentAddress" id="CurrentAddress" class="form-control" placeholder="Your Current Address" required="required" autocomplete="off" value="{{old('CurrentAddress')}}">
						@error('CurrentAddress')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-7 mb-3">
						<label for="RemittancePurpose">Purpose of Remittance:</label>
						<select name="RemittancePurpose" id="RemittancePurpose" class="form-control" required="required">
							<option value="">Purpose of Remittance</option>
							<option {{old('RemittancePurpose') == 'Admission Fee' ? 'selected' : ''}}>Admission Fee</option>
							<option {{old('RemittancePurpose') == 'Tuition Fee' ? 'selected' : ''}}>Tuition Fee</option>
							<option {{old('RemittancePurpose') == "Student's Living Expenses" ? 'selected' : ''}}>Student's Living Expenses</option>
							<option {{old('RemittancePurpose') == "Family Expense" ? 'selected' : ''}}>Family Expense</option>
							<option {{old('RemittancePurpose') == "AMC Renewal Cost" ? 'selected' : ''}}>AMC Renewal Cost</option>
							<option {{old('RemittancePurpose') == "Cost of Goods being Imported" ? 'selected' : ''}}>Cost of Goods being Imported</option>
							<option {{old('RemittancePurpose') == "Cost of Services" ? 'selected' : ''}}>Cost of Services</option>
							<option {{old('RemittancePurpose') == "Payment to Travel Agent for Trip Bookings" ? 'selected' : ''}}>Payment to Travel Agent for Trip Bookings</option>
							<option {{old('RemittancePurpose') == "Advance against Goods/Services" ? 'selected' : ''}}>Advance against Goods/Services</option>
							<option {{old('RemittancePurpose') == "Medical Treatment Cost" ? 'selected' : ''}}>Medical Treatment Cost</option>
							<option {{old('RemittancePurpose') == "Tax Payment" ? 'selected' : ''}}>Tax Payment</option>
						</select>
						<small class="input-description">Please select a purpose from the list below. Depending on the purpose of remittance, you will need to submit different documents to prove the validity of your remittance request, as mandated by the central bank. Please upload the required documents when prompted.</small>
						@error('RemittancePurpose')
							<br>
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
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="Charges">Do you want to deduct the charges from the amount mentioned above, or do you want to pay it over and above the remittance amount?</label>
						<select id="Charges" class="form-control" name="Charges" required="required">
							<option value="">Choose your option for charges</option>
							<option value="yes" {{old('Charges')=='yes' ? 'selected':''}}>Yes, deduct from the remittance amount</option>
							<option value="no" {{old('Charges')=='no' ? 'selected':''}}>No, please add the charges to the remittance amount and debit the total from my account.</option>
						</select>
						@error('Charges')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>	
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryName">Beneficiary Name</label>
						<input type="text" name="BeneficiaryName" id="BeneficiaryName" class="form-control" placeholder="Beneficiary Name" required="required" autocomplete="off" value="{{old('BeneficiaryName')}}">
						<small class="input-description">Please enter the beneficiary's name as reflected in his bank account.</small>
						@error('BeneficiaryName')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryAddress">Beneficiary Address</label>
						<input type="text" name="BeneficiaryAddress" id="BeneficiaryAddress" class="form-control" placeholder="Beneficiary Address" required="required" autocomplete="off" value="{{old('BeneficiaryAddress')}}">
						@error('BeneficiaryAddress')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="City">Beneficiary Address (City)</label>
						<input type="text" name="City" id="City" class="form-control" placeholder="Beneficiary Address (City)" required="required" autocomplete="off" value="{{old('City')}}">
						<small class="input-description">Please enter the name of the City where the beneficiary is.</small>
						@error('City')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="State">Beneficiary Address (State) </label>
						<select name="State" id="State" class="form-control" required="required">
							<option value="">Select the name of the State the beneficiary lives in</option>
							<option {{ old('State') == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman and Nicobar Islands </option>
							<option {{ old('State') == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
							<option {{ old('State') == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
							<option {{ old('State') == 'Assam' ? 'selected' : '' }}>Assam</option>
							<option {{ old('State') == 'Bihar' ? 'selected' : '' }}>Bihar</option>
							<option {{ old('State') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh </option>
							<option {{ old('State') == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
							<option {{ old('State') == 'Dadra and Nagar Haveli and Daman and Diu' ? 'selected' : '' }}>Dadra and Nagar Haveli and Daman and Diu </option>
							<option {{ old('State') == 'Delhi' ? 'selected' : '' }}>Delhi </option>
							<option {{ old('State') == 'Goa' ? 'selected' : '' }}>Goa</option>
							<option {{ old('State') == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
							<option {{ old('State') == 'Haryana' ? 'selected' : '' }}>Haryana</option>
							<option {{ old('State') == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
							<option {{ old('State') == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir </option>
							<option {{ old('State') == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
							<option {{ old('State') == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
							<option {{ old('State') == 'Kerala' ? 'selected' : '' }}>Kerala</option>
							<option {{ old('State') == 'Ladakh' ? 'selected' : '' }}>Ladakh </option>
							<option {{ old('State') == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep </option>
							<option {{ old('State') == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
							<option {{ old('State') == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
							<option {{ old('State') == 'Manipur' ? 'selected' : '' }}>Manipur</option>
							<option {{ old('State') == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
							<option {{ old('State') == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
							<option {{ old('State') == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
							<option {{ old('State') == 'Odisha' ? 'selected' : '' }}>Odisha</option>
							<option {{ old('State') == 'Puducherry' ? 'selected' : '' }}>Puducherry </option>
							<option {{ old('State') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
							<option {{ old('State') == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
							<option {{ old('State') == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
							<option {{ old('State') == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
							<option {{ old('State') == 'Telangana' ? 'selected' : '' }}>Telangana</option>
							<option {{ old('State') == 'Tripura' ? 'selected' : '' }}>Tripura</option>
							<option {{ old('State') == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
							<option {{ old('State') == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand
							<option {{ old('State') == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
						</select>
						<small class="input-description">Please select the name of the State the beneficiary lives in.</small>
						@error('State')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="PinCode">Beneficiary PIN CODE</label>
						<input type="text" name="PinCode" id="PinCode" class="form-control" placeholder="Beneficiary PIN CODE" required="required" autocomplete="off" value="{{old('PinCode')}}">
						@error('PinCode')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryMobileNumber">Beneficiary Mobile Number</label>
						<input type="text" name="BeneficiaryMobileNumber" id="BeneficiaryMobileNumber" class="form-control" placeholder="Beneficiary Mobile Number" required="required" autocomplete="off" value="{{old('BeneficiaryMobileNumber')}}">
						@error('BeneficiaryMobileNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryBank">Beneficiary Bank</label>
						<input type="text" name="BeneficiaryBank" id="BeneficiaryBank" class="form-control" placeholder="Beneficiary Bank" required="required" autocomplete="off" value="{{old('BeneficiaryBank')}}">
						<small class="input-description">Please enter the name of the bank in full (eg: State Bank of India, Axis Bank, etc)</small>
						@error('BeneficiaryBank')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryBankBranch">Beneficiary Bank Branch</label>
						<input type="text" name="BeneficiaryBankBranch" id="BeneficiaryBankBranch" class="form-control" placeholder="Beneficiary Bank Branch" required="required" autocomplete="off" value="{{old('BeneficiaryBankBranch')}}">
						<small class="input-description">Please enter the name of the branch where the beneficiary maintains his/her account (eg: Ektiasal, Madurai, Sahranpur etc)</small>
						@error('BeneficiaryBankBranch')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="BeneficiaryAccountNumber">Beneficiary Account Number</label>
						<input type="text" name="BeneficiaryAccountNumber" id="BeneficiaryAccountNumber" class="form-control" placeholder="Beneficiary Account Number" required="required" autocomplete="off" value="{{old('BeneficiaryAccountNumber')}}">
						<small class="input-description">Please enter the beneficiary's account number correctly. Otherwise the remittance may fail.</small>
						@error('BeneficiaryAccountNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="IfscCode">IFSC Code</label>
						<input type="text" name="IfscCode" id="IfscCode" class="form-control" placeholder="IFSC Code" required="required" autocomplete="off" value="{{old('IfscCode')}}">
						<small class="input-description">IFSC code is the most important identifier for the remittance, and must be entered correctly. If wrongly entered, the transaction may be rejected by the Indian bank and/or land up at the wrong bank/account.</small>
						@error('IfscCode')
							<br>
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
				<div class="row">
					<div class="col-12 mb-3">
						<div class="inner-footer">
							<h5 class="text-bnb-b"><b>Indemnity</b></h5>
							<p>By clicking on the submit button, I hereby confirm that all the details entered by me are correct, and based on this submission, I hereby authorize the bank to process the remittance request and debit my account for the amount of remittance and its charges thereof.</p>

							<p>I also agree that the transaction carried out by the bank based on the details as submitted is acceptable to me, and I shall be solely responsible in case the details provided by me are wrong and the transaction is processed into a wrong account.</p>
							
							<p>Submission of this form to the Bhutan National Bank shall be treated as equivalent to you signing on the physical INR remittance form.</p>
							
							<p>Please note that the transaction shall be processed only if you completed the form properly and attached the required documents, before clicking on "I Agree" to submit this form.</p>
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
				</div>
			</div>
		</div>

		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row">
					<div class="col-12 mb-3">
						<h5 class="text-bnb-b"><b>Document Upload</b></h5>
						<p class="form-description">
							Supporting Documents should be uploaded here. The documents can either be merged into one PDF or uploaded as 3 different documents.
						</p>
						<a href="{{route('inr_remittance_requirement')}}" class="form-description" target="_blank">Required Documents and Charges Guide</a>

						@error('Document')
							<br>
                            <span class="bnb-error m-auto">
                                <small>
                                	<strong>
                                		Supporting Document is required to be uploaded and has to be in format: .pdf | .doc | .docx | .jpeg | .jpg | .png.
                                		<br>
                                		File Size is restricted to 10 MB. 
                                	</strong>
                            	</small>
                            </span>
                            <br>
                        @enderror
                        @error('Document2')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>Supporting Document is required to be uploaded and has to be in format: .pdf | .doc | .docx | .jpeg | .jpg | .png</strong></small>
                            </span>
                            <br>
                        @enderror
                        @error('Document3')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>Supporting Document is required to be uploaded and has to be in format: .pdf | .doc | .docx | .jpeg | .jpg | .png</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>	
					<div class="col-md-4 mb-3">
						<label for=Document>Document 1:</label>
						<input type="file" name="Document" id="uploadImage" class="form-control-file">
					</div>
					<div class="col-md-4 mb-3">
						<label for="Document2">Document 2:</label>
						<input type="file" name="Document2" id="Document2" class="form-control-file">
					</div>
					<div class="col-md-4 mb-3">
						<label for="Document3">Document 3:</label>
						<input type="file" name="Document3" id="Document3" class="form-control-file">
					</div>
					<div class="col-12 mt-5">
						<button type="submit" class="btn btn-primary" id="submitButton">Submit INR Remittance Request Form</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection