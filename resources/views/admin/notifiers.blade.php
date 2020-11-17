@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			@if($key == 'edit')
				<h5 class="text-bnb-b"><b>Edit Notifier Information</b></h5>
				<form method="POST" action="{{ route('update_notifiers_path') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="Email">Email</label>
							<input type="text" id="Email" name="Email" class="form-control" placeholder="Email for sending notification" value="{{$notifiers->email}}">
							@error('Email')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                            <br>
	                        @enderror
						</div>
						<div class="col-md-6 mb-4">
							<label for="MailKey">Mail Key</label>
							<input type="text" id="MailKey" name="MailKey" class="form-control" placeholder="Password for the email" value="{{$notifiers->mail_key}}">
							@error('MailKey')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                            <br>
	                        @enderror
						</div>
						<div class="col-md-12 mb-4">
							<label for="SmsApi">SMS Gateway API</label>
							<input type="text" id="SmsApi" name="SmsApi" class="form-control" placeholder="SMS API String" value="{{$notifiers->sms_api}}">
							@error('SmsApi')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                            <br>
	                        @enderror
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary">Update Notifier</button>
						</div>
					</div>
				</form>
			@else
				<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
				    <thead class="bg-bnb">
				      	<tr>
				        	<th>Email </th>
				        	<th>Authentication Key</th>
				        	<th>SMS API</th>
				        	<th>Action</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@foreach($notifiers as $f)
						    <tr>
						        <td>
						        	{{$f->email}}
						        </td>
						        <td>{{$f->mail_key}}</td>
						        <td><small>{{$f->sms_api}}</small></td>
						        <td class="text-center">
						        	<div class="btn-group">
						        		<a href="{{route('edit_notifiers_path')}}" class="btn btn-primary btn-sm">Edit</a>
						        	</div>
						        </td>
						    </tr>
					    @endforeach
				    </tbody>
			  	</table>
		  	@endif
		</div>
	</div>
@endsection