@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border-admin mb-2 p-5 text-center">
			<h3 class="form-title">{{$form->form}}</h3>
			<p class="form-description-raleway mb-3">{{$form->description}}</p>
		
		</div>		
	</div>
	<div class="row">
		<div class="container-flexible bnb-border-admin mb-2 p-5 form-description">
			
			<div class="row">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Customer Information</b></h5>
				</div>
				<div class="col-md-4 mb-3">
					<label>Form Code :</label>
					<div class="form-control">{{$sform->code}}</div>
				</div>	
				<div class="col-md-4 mb-3">
					<label>Customer's Full Name :</label>
					<div class="form-control">{{$sform->name}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Mobile Number :</label>
					<div class="form-control">{{$sform->mobile_no}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Email Address :</label>
					<div class="form-control">{{$sform->email}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>ID Number :</label>
					<div class="form-control">{{$sform->idnumber}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Account Number :</label>
					<div class="form-control">{{$sform->accountnumber}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Home Branch :</label>
					<div class="form-control">{{$sform->homebranch}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Current Address :</label>
					<div class="form-control-custom">{{$sform->currentaddress}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Purpose of Remittance :</label>
					<div class="form-control-custom">{{$sform->remittancepurpose}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Remittance Amount :</label>
					<div class="form-control">{{$sform->amount}}</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="container-flexible bnb-border-admin mb-2 p-5 form-description">
			<div class="row mb-3">
				<div class="col-12">
					<h5 class="text-bnb-b"><b>Beneficiary Information</b></h5>
				</div>	
				<div class="col-md-4 mb-3">
					<label>Beneficiary Name :</label>
					<div class="form-control">{{$sform->beneficiaryname}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary Mobile Number :</label>
					<div class="form-control">{{$sform->beneficiarymobilenumber}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary Address :</label>
					<div class="form-control-custom">{{$sform->beneficiaryaddress}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary City :</label>
					<div class="form-control">{{$sform->city}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary State :</label>
					<div class="form-control-custom">{{$sform->state}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary PIN Code :</label>
					<div class="form-control">{{$sform->pincode}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary Bank :</label>
					<div class="form-control">{{$sform->beneficiarybank}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary Bank Branch :</label>
					<div class="form-control">{{$sform->beneficiarybankbranch}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Beneficiary Account Number :</label>
					<div class="form-control">{{$sform->beneficiaryaccountnumber}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>IFSC Code :</label>
					<div class="form-control">{{$sform->ifsccode}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Charges :</label>
					<div class="form-control">
						{{$sform->charges}} 
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Submitted On</label>
					<div class="form-control">
						{{date_format($sform->created_at,"d F Y")}} 
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<label>Charges Deduction?</label>
					<div class="form-control-custom">
						{{$sform->chargesoption=='yes'?'Yes, deduct from the remittance amount' : 'No, please add the charges to the remittance amount and debit the total from my account.'}} 
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-flexible bnb-border-admin mb-2 p-3 form-description">
			<div class="row">
				<div class="col-12 mb-3">
					<h5 class="text-bnb-b"><b>Submitted Documents</b></h5>
				</div>	
				@if(!blank($sform->document))
					<div class="col-md-4 mb-3">
						<a href="{{asset($sform->path.'/'.$sform->document)}}" target="_blank">
							<div class="file-container">
								<div class="icon"></div>
								<div class="label">{{substr($sform->document,11)}}</div>
							</div>
						</a>
					</div>
				@endif
				@if(!blank($sform->document2))
					<div class="col-md-4 mb-3">
						<a href="{{asset($sform->path.'/'.$sform->document2)}}" target="_blank">
							<div class="file-container">
								<div class="icon"></div>
								<div class="label">{{substr($sform->document2,11)}}</div>
							</div>
						</a>
					</div>
				@endif
				@if(!blank($sform->document3))
					<div class="col-md-4 mb-3">
						<a href="{{asset($sform->path.'/'.$sform->document3)}}" target="_blank">
							<div class="file-container">
								<div class="icon"></div>
								<div class="label">{{substr($sform->document3,11)}}</div>
							</div>
						</a>
					</div>
				@endif
			</div>


			@if($sform->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp;INRRemittance Form : {{$sform->code}} &nbsp; </strong></small>
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
							<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="inr-remittance{{$action != 'show'?'-search':''}}" data-action="approve">
								Approve Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="inr-remittance{{$action != 'show'?'-search':''}}" data-action="reject">
								Decline Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-info" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="inr-remittance" data-action="change">
								Transfer Branch
							</a>
						</div>
					@else
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="inr-remittance{{$action != 'show'?'-search':''}}" data-action="pending">
								Mark as Pending
							</a>
						</div>
					@endif
				@endif
				<div class="col-sm-3 {{$sform->status != 'pending' ? 'offset-sm-6' : ''}} mb-3">
					@if($action == 'show')
						<a href="{{route('inr_remittance_forms_path')}}" class="btn btn-block btn-primary">
							Back
						</a>
					@else
						<a href="{{route('search_inr_remittance_forms_path',['Name'=>$name,'AccountNumber'=>$account,'MobileNumber'=>$mobile,'BeneficiaryName'=>$bname,'BeneficiaryMobileNumber'=>$bmobile,'code'=>$code,'IdNumber'=>$idnumber])}}" class="btn btn-block btn-primary">
							Back
						</a>
					@endif
				</div>
				<div class="col-sm-12">
					<p><small class="input-description"><q>Approving | Declining</q> the Form will record your user name and date & time of the action.</small></p>
				</div>
			</div>
		</div>
	</div>
@endsection