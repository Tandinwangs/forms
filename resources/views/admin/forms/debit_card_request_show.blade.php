@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center no-mb">
			<h3 class="form-title">{{$form->form}}</h3>
			<p class="form-description-raleway mb-3">{{$form->description}}</p>
		
		</div>		
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			
			<div class="row mb-4">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Customer Information</b></h5>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Form Code :</label>
					<div class="form-control">{{$sform->code}}</div>
				</div>	
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Customer's Full Name :</label>
					<div class="form-control">{{$sform->name}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">CID Number :</label>
					<div class="form-control">{{$sform->cid}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Mobile Number :</label>
					<div class="form-control">{{$sform->mobile_no}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Email Address :</label>
					<div class="form-control">{{$sform->email}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Nationality :</label>
					<div class="form-control">{{$sform->nationality}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Date of Birth :</label>
					<div class="form-control">{{date_format(date_create($sform->dob),'d F Y')}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Name">Present Address :</label>
					<div class="form-control-custom">{{$sform->address}}</div>
				</div>
				<div class="col-12">
				<hr>
				</div>
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Card Request Details</b></h5>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="AccountNumber">Debit Card Type :</label>
					<div class="form-control">{{$sform->debit_card_type}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="AccountNumber">Request For :</label>
					<div class="form-control">{{$sform->request_for}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="AccountNumber">Saving Account Number :</label>
					<div class="form-control">{{$sform->account_number}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="Amount">Account Type :</label>
					<div class="form-control">{{$sform->account_type}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="AccountNumber">Name On Card :</label>
					<div class="form-control">{{$sform->name_on_card}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label for="MobileNumber">Card Collection Location :</label>
					<div class="form-control">{{$sform->branch}}</div>
				</div>
				@if($sform->request_for=='Replacement')
					<div class="col-md-6 mb-3">
						<label for="MobileNumber">Reason for Replacement :</label>
						<div class="form-control-custom">{{$sform->reason}}</div>
					</div>
				@endif
			</div>
			@if($sform->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp;Debit Card Request Form : {{$sform->code}} &nbsp; </strong></small>
                            </span>
						</div>
						<div class="col-md-6 mb-4">
							<label>Form Processed By</label>
							<div class="form-control">{{$sform->user->name}}</div>
						</div>
						<div class="col-md-6 mb-4">
							<label>Processed On</label>
							<div class="form-control">{{date_format(date_create($sform->action_date),'d F Y H:i A')}}</div>
						</div>
						<div class="col-md-3">
							<label>Form Status</label>
							<br>
							<div class="badge badge-lg {{ $sform->status == 'approved' ? 'bg-success' : 'bg-danger' }}">{{$sform->status}}</div>
						</div>
						@if($sform->status != 'approved')
							<div class="col-md-9">
								<label>Reason for Rejection</label>
								<br>
								<div class="form-control-custom">{{$sform->reasonforrejection}}</div>
							</div>
						@endif
					</div>
				</div>
			@endif
			
			<div class="row">
				@if($user->role->role != 'Monitor')
					@if($sform->status == 'pending')
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="debit-card-request{{$action != 'show'?'-search':''}}" data-action="approve">
								Approve Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="debit-card-request{{$action != 'show'?'-search':''}}" data-action="reject">
								Decline Request
							</a>
						</div>
					@else
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="debit-card-request{{$action != 'show'?'-search':''}}" data-action="pending">
								Mark as Pending
							</a>
						</div>
					@endif
				@endif
				<div class="col-sm-3 mb-3">
					<button onclick="window.print();return false;" class="btn btn-block btn-primary">
						Print Form
					</button>
				</div>	
				<div class="col-sm-3 {{$sform->status != 'pending' ? 'offset-sm-6' : ''}}">
					@if($action == 'show')
						<a href="{{route('debit_card_request_forms_path')}}" class="btn btn-primary btn-block">
							Back
						</a>
					@else
						<a href="{{route('search_debit_card_request_forms_path',['Name'=>$name,'AccountNumber'=>$account,'MobileNumber'=>$mobile,'CIDNumber'=>$cidnumber,'Code'=>$code])}}" class="btn btn-primary btn-block">
							Back
						</a>
					@endif
				</div>
			</div>
			<div class="print">
				<p class="mb-5">
					I hereby declare that the information given above is true and correct and would like to request the Bank to update my above details in your system. I also hereby authorize the Bank to deduct any applicable charges related to the issuance of this card.
				</p>
				<br>
				<p class="mt-5">
					{{$sform->name}}
				</p>
			</div>
		</div>		
	</div>
	<div class="pagebreak"></div>
	<div class="print">
		<div class="container-flexible bnb-border mb-2 p-5 text-center no-mb">
			<h5 class="text-bnb-b"><b>Terms and conditions governing the Issue and Usage of BNB Debit Card</b></h5>
			<ol class="text-left">
				<li>Cards, usable at all the Bank terminals, are issued to individual saving and current account holders. However, cards issued to current accounts shall be disabled if the account is converted into an overdraft account/and or has more than one authorized signature.</li>

				<li>The same card can be used in POS terminals. POS machine will be designated by the Bank/merchant for purchase or other purposes as deemed fit.</li>

				<li>The maximum amount a cardholder can withdraw from the ATM and the maximum transaction limit through Point of Sale (POS) terminal in a day within Bhutan is Nu.40,000. This limit may vary depending upon the machine in which the card is used, in line with the machine owner’s terms.</li>

				<li>No withdrawals shall be allowed if the account balance is below the minimum balance as specified by the bank from time to time. However, the bank reserves the right to limit cash withdrawal/usage limit, and also decide on the denominations to be dispensed.</li>
				
				<li>The card holder should generate their own Personal Identification Number (PIN) though Green PIN by visiting the nearest BNB ATM or through mPAY as soon as you take delivery of your card. The PIN number should be kept to yourself, and never be divulged to anybody else. Any disclosure of the PIN shall be at your own risk and responsibility.</li>

				<li>The Bank shall not be liable to the Cardholder for any losses arising out of:
					<ol type="a">
						<li>Non-functioning of the ATM cards due to mechanical errors/failures; and /or</li>
						<li>Transactions effected by anyone other than by the Cardholder or misuse of card due to the Cardholder’s negligence, mistake, dishonesty, misconduct, fraud or handing over the card to an unauthorized person.</li>
					</ol>
				</li>

				<li>The Cardholder must report the loss or theft of the card to the Bank or any of its Branches in writing wherever possible, or else he/she will be liable for any transactions through the ATM until the card is hot listed by the bank. The Bank will, upon adequate verification, hotlist/cancel the card during working hours, on receipt of such intimation. The Bank shall issue a duplicate card for the fee of Nu.100.00 per card. Defective cards will be replaced free of cost.</li>

				<li>It is the sole responsibility of the card holder to verify all his card related transactions with his/her bank statement and report any incidences found to be suspicious, within 15 days of the statement date for rectification/corrections where necessary.</li>

				<li>The Cardholder may at any time discontinue the facility by a written notice to the Bank accompanied with the return of the card.</li>

				<li>The Bank reserves the full authority to cancel this facility with immediate effect at any time, on account of non-fulfillment of any of the terms and conditions by the card holder.</li>
				
				<li>The Bank reserves the right to revise policies, features and benefits offered on the Card and alter these terms and conditions from time to time and may notify the Cardholder of any such alteration in any manner it thinks appropriate. The Cardholder shall be bound by such alteration.</li>
				
				<li>Bank shall debit cardholder's account with the amount withdrawn from the ATM, and any other applicable charges, incurred on account of the usage of this card.</li>

				<li>The transaction record generated by the ATM/POS/online system shall be taken as fully binding on the card holder, unless otherwise verified/corrected by the bank.</li>
			</ol>
			<br>
			<h5 class="text-bnb-b"><b>AGREEMENT:</b></h5>
			<br>
			<p mb-5>I, Mr./Ms./Mrs. <span class="text-bnb-b"><b>{{$sform->name}}</b></span> 	have read, understood and agree to comply with the above terms and conditions and the rules of the Bank in force from time to time governing the conduct of the debit card account.</p>

			<br>
			<br>
			<br>
			<br>
			<p>Signature</p>
		</div>
	</div>
@endsection