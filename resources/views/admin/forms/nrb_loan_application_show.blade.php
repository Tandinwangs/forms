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
					<h5 class="text-bnb-b"><b>Customer Details</b></h5>
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
					<label>Customer's CID :</label>
					<div class="form-control">{{$sform->cid}}</div>
				</div>
				<div class="col-md-4 set-width mb-3">
					<label>Location (Form submitted to) :</label>
					<div class="form-control">{{$sform->branch}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row">
				<div class="p-2 mb-5">
					<h5 class="text-bnb-b"><b>Documents Submitted:</b></h5>
					<a href="{{asset($sform->path.'/'.$sform->bla_upload)}}" target="_blank" class="btn btn-primary px-2">{{ substr($sform->bla_upload,11) }}</a>
				</div>
			</div>


			@if($sform->status != 'pending')
				<div class="inner-container">
					<div class="row mb-3">
						<div class="col-12">
							<span class="bnb-b-span">
                                <small><strong> &nbsp;Account Detail Update Form : {{$sform->code}} &nbsp; </strong></small>
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
							<a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="nrb-loan-application{{$action != 'show'?'-search':''}}" data-action="approve">
								Approve Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="nrb-loan-application{{$action != 'show'?'-search':''}}" data-action="reject">
								Decline Request
							</a>
						</div>
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-info" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="nrb-loan-application" data-action="change-dz">
								Transfer Loaction
							</a>
						</div>
					@else
						<div class="col-sm-3 mb-3">
							<a href="#" class="btn btn-block btn-danger" data-toggle="modal" data-target="#statusModal" data-id="{{ $sform->id }}" data-name="{{ $form->form }}" data-category="nrb-loan-application{{$action != 'show'?'-search':''}}" data-action="pending">
								Mark as Pending
							</a>
						</div>
					@endif
				@endif
				<div class="col-sm-3 {{$sform->status != 'pending' ? 'offset-sm-6' : ''}} mb-3">
					@if($action == 'show')
						<a href="{{route('nrb_loan_application_forms_path')}}" class="btn btn-block btn-primary">
							Back
						</a>
					@else
						
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