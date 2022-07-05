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
			
			<div class="row">
				<div class="col-12">
					<h5 class="text-bnb-b text-center">
						<b>{{$sform->moneygram_reference_number}}</b>
						<br>
						<small>MoneyGram Reference Number</small>
					</h5>
					<hr>
				</div>	
			</div>

			<div class="row">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Receiver Details</b></h5>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Form Code :</label>
					<div class="form-control">{{$sform->code}}</div>
				</div>	
				<div class="col-md-4 set-width mb-3">
					<label>Customer's Full Name :</label>
					<div class="form-control">{{$sform->title}}{{$sform->name}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Occupation :</label>
					<div class="form-control">{{$sform->occupation}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Date of Birth :</label>
					<div class="form-control">{{date_format(date_create($sform->date_of_birth),"d F Y")}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Country of Birth :</label>
					<div class="form-control">{{$sform->country_of_birth}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Current Address :</label>
					<div class="form-control-custom">{{$sform->current_address}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Dzongkhag where you reside currently :</label>
					<div class="form-control">{{$sform->dzongkhag}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Postal Code :</label>
					<div class="form-control">{{$sform->postal_code}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Country where you reside currently :</label>
					<div class="form-control-custom">{{$sform->country}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Contact Number :</label>
					<div class="form-control">{{$sform->mobile_no}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Email Address :</label>
					<div class="form-control">{{$sform->email}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Citizenship Identification Number :</label>
					<div class="form-control">{{$sform->cid}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Your relationship with the sender :</label>
					<div class="form-control">{{$sform->relation}}</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row pagebreak">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row mb-3">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Bank Details</b></h5>
				</div>	
				<div class="col-md-4 set-width mb-3">
					<label>Bank Name :</label>
					<div class="form-control">{{$sform->bank_name}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Bank Branch/Extension :</label>
					<div class="form-control">{{$sform->branch}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Bank Account Number :</label>
					<div class="form-control">{{$sform->account_number}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Full Name of the Account Holder :</label>
					<div class="form-control">{{$sform->account_holder_name}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row mb-3">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Sender/ Remitter</b></h5>
				</div>	
				<div class="col-md-4 set-width mb-3">
					<label>Name of the Sender :</label>
					<div class="form-control">{{$sform->sender_title}}{{$sform->sender_name}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Purpose of Remittance :</label>
					<div class="form-control">{{$sform->remittance_purpose}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>2% Incentive on Remittance :</label>
					<div class="form-control">{{$sform->incentive}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row">
				<div class="p-2 mb-5">
					<h5 class="text-bnb-b"><b>Copy of CID Document Submitted:</b></h5>
					<a href="{{asset($sform->path.'/'.$sform->cid_doc)}}" target="_blank" class="btn btn-primary px-2">{{ substr($sform->cid_doc,11) }}</a>
					@if(!blank($sform->additional_doc))
						<a href="{{asset($sform->path.'/'.$sform->additional_doc)}}" target="_blank" class="btn btn-primary px-2">{{ substr($sform->additional_doc,11) }}</a>
					@endif
				</div>
				@if($sform->incentive == "yes")
					<div class="col-12 mb-3">
						<h5 class="text-bnb-b"><b>Submitted Documents</b></h5>
					</div>	
					@if(!blank($sform->document))
						<div class="col-md-6 mb-3">
							<a href="{{asset($sform->path.'/'.$sform->document)}}" target="_blank">
								<div class="file-container">
									<div class="icon no-print"></div>
									<div class="label">{{substr($sform->document,11)}}</div>
								</div>
							</a>
						</div>
					@endif
					@if(!blank($sform->document2))
						<div class="col-md-6 mb-3">
							<a href="{{asset($sform->path.'/'.$sform->document2)}}" target="_blank">
								<div class="file-container">
									<div class="icon no-print"></div>
									<div class="label">{{substr($sform->document2,11)}}</div>
								</div>
							</a>
						</div>
					@endif
				@endif
			</div>


			@if($sform->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp;MoneyGram Claim Form : {{$sform->code}} &nbsp; </strong></small>
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
							<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="moneygram-claim{{$action != 'show'?'-search':''}}" data-action="approve">
								Approve Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="moneygram-claim{{$action != 'show'?'-search':''}}" data-action="reject">
								Decline Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-info" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="moneygram-claim" data-action="change">
								Transfer Branch
							</a>
						</div>
					@else
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="moneygram-claim{{$action != 'show'?'-search':''}}" data-action="pending">
								Mark as Pending
							</a>
						</div>
					@endif
				@endif
				<div class="col-sm-3 {{$sform->status != 'pending' ? 'offset-sm-6' : ''}} mb-3">
					@if($action == 'show')
						<a href="{{route('money_gram_claim_forms_path')}}" class="btn btn-block btn-primary">
							Back
						</a>
					@else
						<a href="{{route('search_money_gram_claim_forms_path',['Name'=>$name,'MoneyGramReferenceNumber'=>$moneygram_reference_number,'code'=>$code])}}" class="btn btn-block btn-primary">
							Back
						</a>
					@endif
				</div>
				<div class="col-sm-9 no-print">
					<p><small class="input-description"><q>Approving | Declining</q> the Form will record your user name and date & time of the action.</small></p>
				</div>
				<div class="col-sm-3 mb-3">
					<button onclick="window.print();return false;" class="btn btn-block btn-primary">
						Print Form
					</button>
				</div>
			</div>
		</div>
	</div>
@endsection