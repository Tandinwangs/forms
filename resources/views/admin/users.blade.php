@extends('master.adminmaster')
@section('content')
	
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
			    <thead class="bg-bnb">
			      <tr>
			        <th>Name</th>
			        <th>UserName</th>
			        <th>Email</th>
			        <th>Mobile Number</th>
			        <th>Assigned Role(s)</th>
			        <th>Branch</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($users as $u)
				    	<tr>
				        	<td>{{$u->name}}</td>
				        	<td>{{$u->username}}</td>
				        	<td>{{$u->email}}</td>
				        	<td>{{$u->mobile}}</td>
				        	<td>
				        		<span class="badge {{$u->role->role == 'Administrator' ? 'bg-primary' : 'bg-success' }}">{{$u->role->role}}</span>
				        		<!-- <span class="badge bg-success">Administrator</span>
				        		<span class="badge bg-danger">Operation User</span> -->
				        	</td>
				        	<td><small>{{!blank($u->branch_id) ? $u->branch->branch_name : 'Not Available'}}</small></td>
				        	<td class="text-center">
				        		<div class="btn-group">
				        			<a href="{{ route('edit_user_path',$u->id) }}" class="btn btn-primary btn-sm">Edit</a>
				        			@if($u->role->role != 'Administrator')
				        				<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $u->id }}" data-name="{{ $u->name }}" data-category="user">Delete</a>
				        			@endif
				        		</div>
				        	</td>
				      	</tr>
			      	@endforeach
			    </tbody>
		  	</table>
		</div>
	</div>
@endsection