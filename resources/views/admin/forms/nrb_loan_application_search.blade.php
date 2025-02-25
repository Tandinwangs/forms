@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<div class="row">
				<div class="col-sm-9">
					<h4 class="text-bnb-y">Search {{$form->form}}</h4>
					<small class="text-bnb-b"><b>{{$form->description}}</b></small>
				</div>
				<div class="col-sm-3">
					<a href="{{ route('nrb_loan_application_forms_path') }}" class="btn btn-sm btn-primary btn-block">Back to Account Detail Update Forms</a>
					@if(isset($forms))
						<button class="btn btn-sm btn-danger btn-block" data-toggle="collapse" data-target="#expand">Search Parameters</button>
					@endif
				</div>
			</div>
			<hr>
			<div class="collapse {{!isset($forms)?'show':''}}" id="expand">
				<h5 class="text-bnb-b"><b>Search Parameters</b></h5>
				<form method="GET" action="{{route('search_nrb_loan_application_forms_path')}}">
					<div class="row mb-3">
						<div class="col-md-4 mb-3">
							<label for="code">Form Code :</label>
							<input type="text" name="code" id="code" class="form-control" placeholder="Form Code">
						</div>
						<div class="col-md-4 mb-3">
							<label for="Name">Name :</label>
							<input type="text" name="Name" id="Name" class="form-control" placeholder="Name">
						</div>
						<div class="col-md-4 mb-3">
							<label for="Name">CID:</label>
							<input type="text" name="CID" id="CID" class="form-control" placeholder="CID Number"  value="{{old('CID')}}" autocomplete="off">
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-8 offset-sm-2">
							 <button class="btn btn-primary btn-block" type="submit">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	@if(isset($forms))
		<div class="row">
			<div class="container-flexible bnb-border mb-2 p-5 form-description">
				<table class="table table-striped table-bordered table-hover table-responsive-md table-sm">
				    <thead class="bg-bnb">
				      	<tr>
				      		<th>#</th>
				        	<th>Code</th>
				        	<th>Name</th>
							<th>CID</th>
				        	<th>Mobile Number</th>
				        	<th>Status</th>
				        	<th>Processed By</th>
				        	<th>Action</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@php
				    		$i=0
				    	@endphp
				    	@foreach($forms as $f)
						    <tr>
						    	<td><small>{{++$i}}</small></td>
						       	<td><small>{{$f->code}}</small></td>
						       	<td>{{$f->name}}</td>
								   <td>{{$f->cid}}</td>
						       	<td>{{$f->mobile_no}}</td>
						       	<td><span class="badge {{($f->status== 'approved' ? 'bg-success' : ($f->status == 'rejected' ? 'bg-danger' : 'bg-primary'))}}">{{$f->status}}</span></td>
						       	<td><small><span class="span-bnb-b">{{!blank($f->user_id) ? $f->user->name : 'Not Processed'}}</span></small></td>
						        <td class="text-center">
						        	<div class="btn-group">
						        		<a href="{{route('show_nrb_loan_application_form_path',[$f->id,'search-show','code'=>$code,'name'=>$name,'cid'=>$cid])}}" class="btn btn-primary btn-sm"><small>View</small></a>
						        		
						        	</div>
						        </td>
						    </tr>
					    @endforeach
				    </tbody>
			  	</table>
			</div>
		</div>
	@endif
@endsection