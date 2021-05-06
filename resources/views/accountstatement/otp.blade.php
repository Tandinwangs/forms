@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">OTP</h3>
			@if(!blank(session('code')))
	            <h4 class="bnb-error">{{ session('code') }}</h4>
	        @endif
			<p class="form-description-raleway mb-3">
				Please enter the received OTP below.
			</p>
			<form action="#" method="POST">
				@csrf				
				<div class="row">	
					<div class="col-md-4 offset-md-4 mb-3">
						<input type="text" name="otp" id="otp" class="form-control text-center" autocomplete="off" placeholder="OTP" value="{{old('otp')}}">
						@error('otp')
		                    <span class="bnb-error">
		                        <small><strong>{{ $message }}</strong></small>
		                    </span>
		                    <br>
		                @enderror
					</div>
					<div class="col-md-4 offset-md-4">
						<button type="submit" class="btn btn-primary">
							Verify OTP
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection