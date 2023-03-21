@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">MoneyGram Claim Form</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3 text-justify">
				This online remittance claim form is brought to you by Bhutan National Bank Ltd.  and the facility is currently made available for BNB account holders only. 
			</p>
			<p class="form-description-raleway mb-3 text-justify">
				Please fill up all the particulars correctly to avoid erroneous transactions. 
			</p>
			<p class="form-description-raleway mb-3 text-justify">
				<b>IF YOU DO NOT HAVE AN ACCOUNT AT BNBL, PLEASE VISIT THE BRANCH/EXTENSION OFFICE NEAREST TO YOU, TO CLAIM THE FUNDS RECEIVED. PLEASE CARRY YOUR CID WITH YOU.</b>
			</p>
			@if($errors->any())
				<ul class="text-danger">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			<p class="form-description-raleway mb-3 text-justify">
				{{-- Starting July 1, 2022,  --}}
				INDIVIDUAL recipients of inward remittances are eligible to receive 2% incentive on the converted amount (BTN) provided you submit the required documents to the bank.  Remittances received  as
				<ol type="i" class="text-left form-description">
					<li>Donations;</li>
					<li>Foreign Direct Investment;</li>
					<li>Receipts against  Trade and business activities; or</li>
					<li>NGO/CSO and international organization fund transfers, are NOT eligible for the incentive.</li>
				</ol>
			</p>
			<p class="form-description-raleway mb-3 text-justify">
				More details are provided in the subsequent paragraphs.
			
			</p>
		</div>		
	</div>
	<form  method="POST" action="{{route('submit_money_gram_claim_form')}}" enctype="multipart/form-data">
		@csrf


		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="MoneyGramReferenceNumber">MoneyGram Reference Number:</label>
						<input required="required" type="text" name="MoneyGramReferenceNumber" id="MoneyGramReferenceNumber" class="form-control" placeholder="MoneyGram Reference Number"  value="{{old('MoneyGramReferenceNumber')}}" autocomplete="off" minlength="8" maxlength="8" required="required">
						<small class="input-description">Please enter here the MoneyGram Reference Number that you have received.</small>
						@error('MoneyGramReferenceNumber')
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
				<h4 class="text-bnb-b">Receiver Details</h4>
				<p><small class="input-description">Please enter all the details correctly. All fields are mandatory.</small></p>
				<div class="row">
					<div class="col-sm-2 mb-3">
						<label for="Title">Title:</label>
						<select required="required" class="form-control"  name="Title" id="Title">
							<option value="">Title</option>
							<option {{old('Title') == 'Mr.' ? 'selected':''}}>Mr.</option>
							<option {{old('Title') == 'Mrs.' ? 'selected':''}}>Mrs.</option>
							<option {{old('Title') == 'Ms.' ? 'selected':''}}>Ms.</option>
							<option {{old('Title') == 'Miss' ? 'selected':''}}>Miss</option>
							<option {{old('Title') == 'Other...' ? 'selected':''}}>Other...</option>
						</select>
						@error('Title')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="Name">Your Name:</label>
						<input required="required" type="text" name="Name" id="Name" class="form-control" placeholder="Your Full Name"  value="{{old('Name')}}" autocomplete="off">
						<small class="input-description">Please enter your complete name in the following order: First Name, Middle Name, Surname</small>
						@error('Name')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Occupation">Your Occupation:</label>
						<input required="required" type="text" name="Occupation" id="Occupation" class="form-control" placeholder="Your Occupation"  value="{{old('Occupation')}}" autocomplete="off">
						@error('Occupation')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="DateOfBirth">Date of Birth:</label>
						<input required="required" type="date" name="DateOfBirth" id="DateOfBirth" class="form-control"  value="{{old('DateOfBirth')}}" autocomplete="off">
						<small class="input-description">Please enter your date of birth in the correct format.</small>
						@error('DateOfBirth')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="CountryOfBirth">Country of Birth:</label>
						<input required="required" type="text" name="CountryOfBirth" id="CountryOfBirth" class="form-control"  value="{{old('CountryOfBirth')}}" placeholder="Country of Birth" autocomplete="off">
						@error('CountryOfBirth')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="CurrentAddress">Current Address:</label>
						<input required="required" type="text" name="CurrentAddress" id="CurrentAddress" class="form-control"  value="{{old('CurrentAddress')}}" autocomplete="off">
						<small class="input-description">Please provide your complete address here. You should include Street Number (if any), Street Name, Village, Geog, Dungkhag/Throm.</small>
						@error('CurrentAddress')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="PermanentAddress">Permanent Address:</label>
						<input required="required" type="text" name="PermanentAddress" id="PermanentAddress" class="form-control"  value="{{old('PermanentAddress')}}" autocomplete="off">
						<small class="input-description">Please provide your complete address here. You should include Street Number (if any), Street Name, Village, Geog, Dungkhag/Throm.</small>
						@error('PermanentAddress')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Dzongkhag">Dzongkhag where you reside currently:</label>
						<select required="required" name="Dzongkhag" id="Dzongkhag" class="form-control" >
							<option value="">Select Dzongkhag</option>
							<option>Bumthang</option>
							<option>Chhukha</option>
							<option>Dagana</option>
							<option>Gasa</option>
							<option>Haa</option>
							<option>Lhuentse</option>
							<option>Mongar</option>
							<option>Paro</option>
							<option>Pema Gatshel</option>
							<option>Punakha</option>
							<option>Samdrup Jongkhar</option>
							<option>Samtse</option>
							<option>Sarpang</option>
							<option>Thimphu</option>
							<option>Trashigang</option>
							<option>Trashi Yangtse</option>
							<option>Trongsa</option>
							<option>Tsirang</option>
							<option>Wangdue Phodrang</option>
							<option>Zhemgang</option>
						</select>
						@error('Dzongkhag')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="PostalCode">Postal Code:</label>
						<input required="required" type="text" name="PostalCode" id="PostalCode" class="form-control" placeholder="Postal Code"  value="{{old('PostalCode')}}" autocomplete="off">
						<small class="input-description">Please enter the postal code here. IF YOU DO NOT HAVE/KNOW THE POSTAL CODE, ENTER "0000"</small>
						@error('PostalCode')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Country">Country where you reside currently:</label>
						<select required="required" name="Country" id="Country" class="form-control" >
							<option>Bhutan</option>
						</select>
						@error('Country')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="ContactNumber">Contact Number:</label>
						<input required="required" type="text" name="ContactNumber" id="ContactNumber" class="form-control" placeholder="Your Contact Number"  value="{{old('ContactNumber')}}" autocomplete="off" maxlength="8" minlength="8">
						<small class="input-description">Please enter the mobile number registered with the bank.</small>
						@error('ContactNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="Email">Email Address:</label>
						<input required="required" type="email" name="Email" id="Email" class="form-control" placeholder="Your Email ID"  autocomplete="off" value="{{old('Email')}}">
						@error('Email')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="CitizenshipIdentificationNumber">Citizenship Identification Number:</label>
						<input required="required" type="text" name="CitizenshipIdentificationNumber" id="CitizenshipIdentificationNumber" class="form-control" placeholder="Your ID Number"  value="{{old('CitizenshipIdentificationNumber')}}" autocomplete="off">
						<small class="input-description">Please enter your CID/ Passport/ SRP number as registered with the bank.</small>
						@error('CitizenshipIdentificationNumber')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="relation">Your relationship with the sender:</label>
						<input required="required" type="text" name="relation" id="relation" class="form-control" placeholder="Your relationship with the sender"  value="{{old('relation')}}" autocomplete="off">
						@error('relation')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="cid_doc">Copy of CID:</label>
						<input required="required" type="file" name="cid_doc" id="cid_doc" class="">
						@error('cid_doc')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="additional_doc">Additional Document (Optional):</label>
						<input type="file" name="additional_doc" id="additional_doc" class="form-control-file">
						@error('additional_doc')
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
				<h4 class="text-bnb-b">Bank Details</h4>
				<p><small class="input-description">Please enter your bank details correctly</small></p>
				<div class="row">	
					<div class="col-md-4 mb-3">
						<label for="BankName">Bank Name:</label>
						<input required="required" type="text" name="BankName" id="BankName" class="form-control" placeholder="Remittance BankName"  autocomplete="off" value="Bhutan National Bank Limited">
						<small class="input-description">This facility is currently available for BNB account holders only.</small>
						@error('BankName')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="HomeBranch">Bank Branch/Extension</label>
						<select required="required" class="form-control" name="HomeBranch" id="HomeBranch" >
							<option value="">Choose</option>
							@foreach($branches as $b)
								<option {{$b->branch_name == old('HomeBranch') ? 'selected' : ''}}>{{$b->branch_name}}</option>
							@endforeach
						</select>
						<small class="input-description">Please select the name of the branch/extension where you opened/have your account.</small>
						@error('HomeBranch')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountNumber">Bank Account Number:</label>
						<input required="required" type="text" name="AccountNumber" id="AccountNumber" class="form-control" placeholder="Bank Account Number"  value="{{old('AccountNumber')}}" autocomplete="off">
						@error('AccountNumber')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="AccountHolderName">Full Name of the Account Holder:</label>
						<input required="required" type="text" name="AccountHolderName" id="AccountHolderName" class="form-control" placeholder="Full Name of the account Holder"  value="{{old('AccountHolderName')}}" autocomplete="off">
						<small class="input-description">Please note that the name in this field will be matched with the name of the receiver (the name you entered at the beginning) and the transaction processed only if they match.</small>
						@error('AccountHolderName')
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
				<h4 class="text-bnb-b">Sender/ Remitter</h4>
				<p><small class="input-description">Please enter the correct details of who sent you the money</small></p>
				<div class="row">
					<div class="col-sm-2 mb-3">
						<label for="SenderTitle">Title:</label>
						<select required="required" class="form-control"  name="SenderTitle" id="SenderTitle">
							<option value="">Title</option>
							<option {{old('SenderTitle') == 'Mr.' ? 'selected':''}}>Mr.</option>
							<option {{old('SenderTitle') == 'Mrs.' ? 'selected':''}}>Mrs.</option>
							<option {{old('SenderTitle') == 'Ms.' ? 'selected':''}}>Ms.</option>
							<option {{old('SenderTitle') == 'Miss' ? 'selected':''}}>Miss</option>
							<option {{old('SenderTitle') == 'Other...' ? 'selected':''}}>Other...</option>
						</select>
						@error('SenderTitle')
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-6 mb-3">
						<label for="SenderName">Name of the Sender:</label>
						<input required="required" type="text" name="SenderName" id="SenderName" class="form-control" placeholder="Name of the Sender"  value="{{old('SenderName')}}" autocomplete="off">
						<small class="input-description">Please enter the full name of the sender in the following order: First Name, Middle Name, Surname.</small>
						@error('SenderName')
							<br>
                            <span class="bnb-error m-auto">
                                <small><strong>{{$message}}</strong></small>
                            </span>
                            <br>
                        @enderror
					</div>
					<div class="col-md-4 mb-3">
						<label for="RemittancePurpose">Purpose of Remittance:</label>
						<select required="required" class="form-control"  name="RemittancePurpose" id="RemittancePurpose">
							<option value="">Select Purpose of Remittance</option>
							<option {{old('RemittancePurpose') == 'Educational Support' ? 'selected' : ''}}>Educational Support</option>
							<option {{old('RemittancePurpose') == 'Family Support/Maintenance' ? 'selected' : ''}}>Family Support/Maintenance</option>
							<option {{old('RemittancePurpose') == 'Gift' ? 'selected' : ''}}>Gift</option>
							<option {{old('RemittancePurpose') == 'Healthcare/Medical Support' ? 'selected' : ''}}>Healthcare/Medical Support</option>
							<option {{old('RemittancePurpose') == 'Investments' ? 'selected' : ''}}>Investments</option>
							<option {{old('RemittancePurpose') == 'Mortgage Payment' ? 'selected' : ''}}>Mortgage Payment</option>
							<option {{old('RemittancePurpose') == 'Personal Use' ? 'selected' : ''}}>Personal Use</option>
							<option {{old('RemittancePurpose') == 'Donation' ? 'selected' : ''}}>Donation</option>
							<option {{old('RemittancePurpose') == 'Other...' ? 'selected' : ''}}>Other...</option>
						</select>
						@error('RemittancePurpose')
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
				<h4 class="text-bnb-b">2% Incentive on Remittance</h4>
				<p>
					From 1st July 2022, you are eligible to claim 2% incentive on the amount received by you in BTN, provided the sender is a non-resident Bhutanese, the recipient is an INDIVIDUAL, and the money is NOT meant for the following purpose(s):
				</p>
				<ol type="i">
					<li>As Donation;</li>
					<li>Remittance pertaining to Foreign Direct Investment;</li>
					<li>Receipts for Trade and business activities; or</li>
					<li>Remittances to NGO/CSO and international organization fund transfers.</li>
				</ol>
				<p>
					If you think you are eligible and plan to claim the incentive, please upload copies of the following listed documents (upload link below) or send them to remittance@bnb.bt by email, with the email subject as: "Incentive Claim on MoneyGram remittance no. [your MG reference number]" within 10 days of submitting this form:
					<ol>
						<li>Copy of the senders' CID/ Passport; and</li>
						<li>Senders' proof of residency abroad (it can be either of: a copy of his/her Visa/ Phone Bill/ electricity bill/ a letter from the nearest Bhutanese embassy/ mission/ consulate, etc)</li>
					</ol>
				</p>
				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="Incentive">Are you claiming the incentive?</label>
						<select required="required" id="Incentive" class="form-control" name="Incentive" >
							<option value="">Select your option</option>
							<option value="yes" {{old('Incentive')=='yes' ? 'selected':''}}>Yes</option>
							<option value="no" {{old('Incentive')=='no' ? 'selected':''}}>No</option>
						</select>
						@error('Incentive')
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
				<h4 class="text-bnb-b">Confirmation about the claim of Incentive</h4>
				<p>I understand that I am required to submit the required documents by uploading it or by email to remittance@bnb.bt within the next 10 days after submitting this form to claim the incentive.</p>

				<p><b>
					PLEASE ENSURE THAT THE EMAIL SUBJECT IS CORRECTLY MENTIONED AS DETAILED ABOVE; OTHERWISE YOU MAY BE INELIGIBLE FOR THE INCENTIVE.
				</b></p>
				<div class="row">
					<div class="col-12 mb-3">
						<h5 class="text-bnb-b">Document Upload</h5>
						<p class="form-description">
							Supporting Documents should be uploaded here.
							<p>
                                <small>
									Supporting Document is required to be uploaded and has to be in format: .pdf | .doc | .docx | .jpeg | .jpg | .png.                              		File Size is restricted to 10 MB. 
                            	</small>
                            </p>
						</p>

						@error('Document') 
                            <span class="bnb-error mb-2">
                                <small>
                                	<strong>
                                		Document 1 is required as you have selected "Yes" for "Are you claiming the incentive?" 
                                	</strong>
                            	</small>
                            </span>
                            <br>
                        @enderror
                        @error('Document2')
                            <span class="bnb-error mb-2">
                                <small>
                                	<strong>
                                		Document 2 is required as you have selected "Yes" for "Are you claiming the incentive?" 
                                	</strong>
                            	</small>
                            </span>
                            <br>
                        @enderror
					</div>	
					<div class="col-md-6 mb-3">
						<label for=Document>Document 1:</label>
						<input type="file" name="Document" id="Document" class="form-control-file">
					</div>
					<div class="col-md-6 mb-3">
						<label for="Document2">Document 2:</label>
						<input type="file" name="Document2" id="Document2" class="form-control-file">
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
							<p>By Submitting this form to the Bank, I hereby confirm that all the details entered by me are correct, and based on this submission, I acknowledge the receipt of the MoneyGram transfer as per the reference number I have mentioned at the beginning of this form.</p>

							<p>I also agree that the transaction carried out by the bank based on the details as submitted is acceptable to me, and I shall be solely responsible in case the details provided by me are wrong and the transaction is processed into a wrong account.</p>
							
							<p>Submission of this form to the Bhutan National Bank shall be treated as equivalent to your signing on the physical MoneyGram Claim Form.</p>
							
							<p>The transaction shall be processed only if you click on "I Agree".</p>
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

		                        <br>
		                        <div class="col-12 mt-5 text-center">
									<button type="submit" class="btn btn-primary" id="submitButton">Submit MoneyGram Claim Form</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</form>
@endsection