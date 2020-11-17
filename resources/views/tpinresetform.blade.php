@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 text-center">
			<h3 class="form-title">mPAY T-PIN Reset Form</h3>
			<p class="form-description-raleway">
				BNB mPAY(Mobile Banking) User-Block / Unblock / Forgot TPIN / Hotlist / DeHotlist / Terminate User / Multiple Account
			</p>
		</div>		
	</div>
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<form>	
				<div class="row">	
					<div class="col-md-4 mb-3">
						<label>Mobile Number:</label>
						<input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number">
					</div>
					<div class="col-md-4 mb-3">
						<label>Email ID:</label>
						<input type="email" name="email" class="form-control" placeholder="Your Email ID">
					</div>
					<div class="col-md-4 mb-3">
						<label>Registration Type:</label>
						<select class="form-control">
							<option>Customer</option>
							<option>Merchant</option>
						</select>
					</div>
					<div class="col-12 mb-3">	
						Action Requested (Please tick)
						<div class="row">	
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> User Block
							</div>
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> User Un-Block
							</div>
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> Forgot TPIN
							</div>
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> Mobile Hotlist
							</div>
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> De Hotlist
							</div>
							<div class="col-md-4 col-xs-6 mb-3">
								<input type="checkbox" name="" class=""> Terminate User
							</div>
						</div>	
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary">
							Submit
						</button>
					</div>
				</div>	
			</form>
		</div>		
	</div>
@endsection