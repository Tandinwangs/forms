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
					<label for="Name">Form Code :</label>
					<div class="form-control">{{$sform->code}}</div>
				</div>	
				<div class="col-md-4 mb-3">
					<label for="Name">Customer's Full Name :</label>
					<div class="form-control">{{$sform->name}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Name">Mobile Number :</label>
					<div class="form-control">{{$sform->mobile_no}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Name">Email Address :</label>
					<div class="form-control">{{$sform->email}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Name">ID Number :</label>
					<div class="form-control">{{$sform->cid}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="AccountNumber">Saving Account Number :</label>
					<div class="form-control">{{$sform->account_number}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="AccountNumber">FD/FD+/RD Account Number :</label>
					<div class="form-control">{{$sform->tdrd_account_number}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="Amount">Account Type :</label>
					<div class="form-control">{{$sform->account_type}}</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="MobileNumber">Branch :</label>
					<div class="form-control">{{$sform->branch}}</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="MobileNumber">Reason for Closure :</label>
					<div class="form-control-custom">{{$sform->reason}}</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="MobileNumber">Your Feedback :</label>
					<div class="form-control-custom">{{!blank($sform->feedback) ? $sform->feedback : 'Feedback was not provided by the customer'}}</div>
				</div>
			</div>
			@if($sform->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp;Premature Withdrawal Form : {{$sform->code}} &nbsp; </strong></small>
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
							<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="premature-withdrawal{{$action != 'show'?'-search':''}}" data-action="approve">
								Approve Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="premature-withdrawal{{$action != 'show'?'-search':''}}" data-action="reject">
								Decline Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-info" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="premature-withdrawal" data-action="change-br">
								Transfer Branch
							</a>
						</div>
					@else
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="premature-withdrawal{{$action != 'show'?'-search':''}}" data-action="pending">
								Mark as Pending
							</a>
						</div>
					@endif
				@endif
						
				<div class="col-sm-3 {{$sform->status != 'pending' ? 'offset-sm-6' : ''}}">
					@if($action == 'show')
						<a href="{{route('premature_withdrawal_forms_path')}}" class="btn btn-primary btn-block">
							Back
						</a>
					@else
						<a href="{{route('search_premature_withdrawal_forms_path',['Name'=>$name,'SavingAccountNumber'=>$account,'MobileNumber'=>$mobile,'FdRdAccountNumber'=>$fdrdaccount,'IdNumber'=>$idnumber,'Code'=>$code])}}" class="btn btn-primary btn-block">
							Back
						</a>
					@endif
				</div>
			</div>
		</div>		
	</div>
@endsection