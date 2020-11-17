@extends('master.master')
@section('content')
	@if($key == 'user')
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
				<div class="col-sm-6 offset-sm-3">
					<p>Please enter your User Name</p>
					<form action="{{route('verify_username_path')}}" method="POST">
						@csrf
						<input type="text" name="username" class="form-control form-control-lg mb-3 text-center" required="required" autocomplete="off" placeholder="Your User Name">

						
						<button class="btn btn-primary btn-block btn-lg">Send OTP</button>
					</form>
				</div>
			</div>
		</div>
	@else
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
				<div class="col-sm-6 offset-sm-3">
					<p>Please check your registered email or mobile for OTP and enter the OTP below. Trying incorrectly for more than 3 times will render the OTP invalid.</p>
					<form action="{{route('verify_otp_path')}}" method="POST">
						<div class="row">
							@csrf
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
							</div>
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
							</div>
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
							</div>
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
							</div>
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
							</div>
							<div class="col-2">
								<input type="text" name="otp[]" class="form-control form-control-lg mb-3 text-center" maxlength="1" required="required" pattern="[0-9]" autocomplete="off">
								<input type="hidden" name="userid" value="{{$user}}">
							</div>
							@error('otp.*')
								<div class="col-12 text-center mb-3">
		                            <span class="bnb-error">
		                                <small><strong>OTP must be 6 digit Number. Please enter the correct OTP.</strong></small>
		                            </span>
	                            </div>
	                        @enderror
							<button class="btn btn-primary btn-block btn-lg">Verify OTP</button>	

						</div>
					</form>
				</div>
			</div>
		</div>
	@endif
@endsection