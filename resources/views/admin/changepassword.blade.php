@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<h5 class="text-bnb-b"><b>{{ __('Change Password') }}</b></h5>
			<form method="POST" action="{{route('change_password_path',$user->id)}}">
				@csrf
				<div class="row mb-4">
					<div class="col-md-4">
						<label for="currentpassword">Current Password</label>
						<input type="password" id="currentpassword" name="currentpassword" class="form-control" placeholder="Enter Password">
						@error('currentpassword')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
					</div>
					<div class="col-md-4">
						<label for="password">New Password</label>
						<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
						@error('password')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
					</div>
					<div class="col-md-4">
						<label for="password_confirmation">Confirm New Password</label>
						<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button class="btn btn-primary">Change Password</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection