@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row">
				<div class="col-sm-9">
					<h4 class="text-bnb-y">{{$form->form}}</h4>
					<small class="text-bnb-b"><b>{{$form->description}}</b></small>
				</div>
				<div class="col-sm-3">
					<a href="{{ route('search_inr_remittance_form_path') }}" class="btn btn-sm btn-primary btn-block">Advance Search Options</a>
				</div>
			</div>
			<hr>
			<h5 class="text-bnb-b"><b>Recently Submitted Form</b></h5>
			@if(!blank($forms))
				<table class="table table-striped table-bordered table-hover table-responsive-md table-sm">
				    <thead class="bg-bnb">
				      	<tr>
				        	<th>Code</th>
				        	<th>Customer Name</th>
				        	<th>Account Number</th>
				        	<th>Mobile Number</th>
				        	<th>Amount</th>
				        	<th>Beneficiary Name</th>
				        	<th>Submitted On</th>
				        	<th>Action</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@foreach($forms as $f)
						    <tr>
						       	<td><small>{{$f->code}}</small></td>
						       	<td>{{$f->name}}</td>
						       	<td>{{$f->accountnumber}}</td>
						       	<td>{{$f->mobile_no}}</td>
						       	<td>{{$f->amount}}</td>
						       	<td>{{$f->beneficiaryname}}</td>
						       	<td><small>{{date_format($f->created_at,'d-M-y H:iA')}}</small></td>
						        <td class="text-center">
						        	<div class="btn-group">
						        		<a href="{{route('show_inr_remittance_form_path',[$f->id,'show'])}}" class="btn btn-primary btn-sm"><small>View</small></a>
						        	</div>
						        </td>
						    </tr>
					    @endforeach
				    </tbody>
			  	</table>
			  	{{ $forms->links() }}
			@else
				<div class="text-center">
					<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
				</div>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<h5 class="text-bnb-b"><b>Processed Form</b></h5>
			@if(!blank($pforms))
				<table class="table table-striped table-bordered table-hover table-responsive-md table-sm">
				    <thead class="bnb-y">
				      	<tr>
				        	<th>Code</th>
				        	<th>Customer Name</th>
				        	<th>Mobile Number</th>
				        	<th>Amount</th>
				        	<th>Beneficiary Name</th>
				        	<th>Submitted On</th>
				        	<td>Status</td>
				        	<th>Processed By</th>
				        	<th>Processed On</th>
				        	<th>Action</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@foreach($pforms as $f)
						    <tr>
						       	<td><small>{{$f->code}}</small></td>
						       	<td>{{$f->name}}</td>
						       	<td>{{$f->mobile_no}}</td>
						       	<td>{{$f->amount}}</td>
						       	<td>{{$f->beneficiaryname}}</td>
						       	<td><small>{{date_format($f->created_at,'d-M-y H:iA')}}</small></td>
						       	<td><label class="badge {{$f->status == 'approved' ? 'bg-success' : 'bg-danger' }}" title="{{$f->reasonforrejection}}" data-toggle="tooltip">{{$f->status}}</label></td>
						       	<td><small>{{$f->user->name}}</small></td>
						       	<td><small>{{date_format(date_create($f->action_date),'d-M-y H:iA')}}</small></td>
						        <td class="text-center">
						        	<div class="btn-group">
						        		<a href="{{route('show_inr_remittance_form_path',[$f->id,'show'])}}" class="btn btn-primary btn-sm"><small>View</small></a>
						        	</div>
						        </td>
						    </tr>
					    @endforeach
				    </tbody>
			  	</table>
			  	{{ $pforms->links() }}
			@else
				<div class="text-center">
					<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
				</div>
			@endif
		</div>
	</div>
@endsection