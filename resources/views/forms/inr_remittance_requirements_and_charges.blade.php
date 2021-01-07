@extends('master.master')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5">
			<div class="row">
				<h3 class="form-title text-center">INR Remittance Document Requirements and Charges</h3>
				<div class="col-md-8">
					<h5 class="text-bnb-b pt-5"><b>Admission Fee</b></h5>
					<p class="form-description-raleway">
						A detailed admission letter that includes the start date & end date of the course applied for & the total admission fee to be paid at this time.
					</p>
					<h5 class="text-bnb-b"><b>Tuition Fee</b></h5>
					<p class="form-description-raleway">
						Provide the tuition fee details, along with a valid student ID of the person for whom you are paying the tuition fee.
					</p>
					<h5 class="text-bnb-b"><b>Living Expenses for Student</b></h5>
					<p class="form-description-raleway">
						Provide a valid student ID to whom you are remitting the living expenses.
					</p>
					<h5 class="text-bnb-b"><b>Payments to travel agents & medical institutions</b></h5>
					<p class="form-description-raleway">
						Provide valid invoices.
					</p>
					<h5 class="text-bnb-b"><b>Family Expenses</b></h5>
					<p class="form-description-raleway">
						Please provide a copy of your Work Permit.
					</p>
					<h5 class="text-bnb-b"><b>AMC Renewal</b></h5>
					<p class="form-description-raleway">
						Provide a valid documents that mentions the renewal period and amount of the AMC.
					</p>
					<h5 class="text-bnb-b"><b>For Import of Goods / Advance Payments</b></h5>
					<p class="form-description-raleway">
						Provide a copy of the import license and pro forma invoice of the exporter/supplier. 
					</p>
					<h5 class="text-bnb-b"><b>For tax Payments</b></h5>
					<p class="form-description-raleway">
						Provide a valid tax invoice from the concerned authorities.
					</p>
					<h5 class="text-bnb-b"><b>Cost of Services</b></h5>
					<p class="form-description-raleway">
						Please provide a copy of the import license and pro forma invoice of the exporter/supplier.
					</p>
				</div>
				<div class="col-md-4">
					<h5 class="text-bnb-b pt-5"><b>Charges</b></h5>
					<table class="table table-bordered table-hover table-striped">
						<tr class="table-primary">
							<th>Amount</th>
							<th>TT Charges</th>
							<th>RTGS Charges</th>
						</tr>
						<tr>
							<td>Less than Nu.100,000</td>
							<td>Nu.55</td>
							<td rowspan="3">TT Charges + Nu.100</td>
						</tr>
						<tr>
							<td>Upto  Nu.1,000,000</td>
							<td>0.20% of TT amount + Nu.20</td>
						</tr>
						<tr>
							<td>More than Nu.1,000,000</td>
							<td>
								0.175% of TT amount + Nu.20
								<br>
								(Minimum Nu.2,000 and Maximum Nu.15,000)
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>		
	</div>
@endsection