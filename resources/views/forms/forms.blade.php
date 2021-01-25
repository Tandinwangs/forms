@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<div class="row">
				
				@foreach($forms as $f)
					<div class="col-md-6 mb-3">
						<a href="{{route($f->client_path)}}" class="no-decoration">
							<div class="form-container">
								<h1>{{ $f->form }}</h1>
								<hr>
								<h4>{{$f->description}}</h4>
							</div>
						</a>
					</div>
				@endforeach

				<div class="col-md-6 mb-3">
					<a href="https://forms.gle/BRGrMQz6Q3tqqrnW6" class="no-decoration">
						<div class="form-container">
							<h1>MoneyGram Claim Form</h1>
							<hr>
							<h4>This online remittance claim form is brought to you by Bhutan National Bank Ltd.  and the facility is currently made available for BNB account holders only. </h4>
						</div>
					</a>
				</div>

				<div class="col-md-6 mb-3">
					<a href="https://www.bnb.bt/new-atm-debit-card/" class="no-decoration">
						<div class="form-container">
							<h1>Apply for a new RuPay / ATM Debit Card </h1>
							<hr>
							<h4>Kindly fill this form if you are applying for RuPay / ATM Debit card for the first time.</h4>
						</div>
					</a>
				</div>

				<div class="col-md-6 mb-3">
					<a href="https://www.bnb.bt/new-atm-debit-card/" class="no-decoration">
						<div class="form-container">
							<h1>Duplicate ATM/Debit Card Online Application</h1>
							<hr>
							<h4>Kindly fill this form if you are applying for RuPay / ATM Debit card replacement.</h4>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
@endsection