@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">{{$form->form}}</h3>
			<p class="form-description-raleway mb-3">{{$form->description}}</p>
		
		</div>		
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			
			<div class="row">
				<div class="col-md-4 mb-3">
					<label for="Name">Gift Form Code :</label>
					<div class="form-control">{{$gift->code}}</div>
				</div>	
				<div class="col-md-4 mb-3">
					<label for="Name">Customer's Full Name :</label>
					<div class="form-control">{{$gift->name}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="AccountNumber">Account Number :</label>
					<div class="form-control">{{$gift->account_number}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Amount">Amount to be Transferred (in Nu.) :</label>
					<div class="form-control">{{$gift->amount}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="MobileNumber">Mobile Number :</label>
					<div class="form-control">{{$gift->mobile_no}}</div>
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
					<div class="form-control">{{$gift->beneficiary_name}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="BeneficiaryAccountNumber">Beneficiary Account Number :</label>
					<div class="form-control">{{$gift->beneficiary_account_number}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="AccountType">Account Type :</label>
					<div class="form-control">{{$gift->account_type}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="BeneficiaryBankName">Beneficiary Bank Name :</label>
					<div class="form-control">{{$gift->beneficiary_bank}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Branch">Branch :</label>
					<div class="form-control">{{$gift->branch}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label>Submitted On</label>
					<div class="form-control">
						{{date_format($gift->created_at,"d F Y")}} 
					</div>
				</div>
			</div>
			@if($gift->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp; Gift Form : {{$gift->code}} &nbsp; </strong></small>
                            </span>
						</div>
						<div class="col-md-6">
							<label for="password">Form Processed By</label>
							<div class="form-control">{{$gift->user->name}}</div>
						</div>
						<div class="col-md-6">
							<label for="password_confirmation">Processed On</label>
							<div class="form-control">{{date_format(date_create($gift->action_date),'d F Y H:i A')}}</div>
						</div>
						<div class="col-md-3">
							<label>Form Status</label>
							<br>
							<div class="badge badge-lg {{ $gift->status == 'approved' ? 'bg-success' : 'bg-danger' }}">{{$gift->status}}</div>
						</div>
						@if($gift->status != 'approved')
							<div class="col-md-9">
								<label>Reason for Rejection</label>
								<br>
								<div class="form-control-custom">{{$gift->reasonforrejection}}</div>
							</div>
						@endif
					</div>
				</div>
			@endif
			<div class="row">
				@if($gift->status == 'pending')
					<div class="col-sm-4 mb-3">
						<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $gift->id }}" data-name="{{ $form->form }}" data-category="gift{{$action != 'show'?'-search':''}}" data-action="approve">
							Approve Request
						</a>
					</div>
					<div class="col-sm-4 mb-3">
						<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $gift->id }}" data-name="{{ $form->form }}" data-category="gift{{$action != 'show'?'-search':''}}" data-action="reject">
							Decline Request
						</a>
					</div>
				@else
					<div class="col-sm-4 mb-3">
						<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $gift->id }}" data-name="{{ $form->form }}" data-category="gift{{$action != 'show'?'-search':''}}" data-action="pending">
							Mark as Pending
						</a>
					</div>
				@endif
				<div class="col-sm-4 {{$gift->status != 'pending' ? 'offset-sm-4' : ''}} mb-3">
					@if($action == 'show')
						<a href="{{route('gift_forms_path')}}" class="btn btn-primary btn-block">
							Back to Gift Forms
						</a>
					@else
						<a href="{{route('search_gift_forms_path',['Code'=>$code,'Name'=>$cname,'AccountNumber'=>$caccount,'MobileNumber'=>$cmobile,'BeneficiaryName'=>$bname,'BeneficiaryAccountNumber'=>$baccount,'BeneficiaryBankName'=>$bank])}}" class="btn btn-primary btn-block">
							Back to Search Results
						</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection