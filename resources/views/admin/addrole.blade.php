@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			@if($key == 'edit')
				<h5 class="text-bnb-b"><b>Edit Role</b></h5>
				<form method="POST" action="{{ route('edit_role_path',$role->id) }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="role">Role</label>
							<input type="text" id="role" name="role" class="form-control" required="required" placeholder="Role" value="{{$role->role}}">
						</div>
						<div class="col-md-6 mb-4">
							<label for="role_description">Role Description</label>
							<input type="text" id="role_description" name="role_description" class="form-control" required="required" placeholder="Role Description" value="{{ $role->description }}">
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<button class="btn btn-primary">Update Role</button>
						</div>
						<div class="col-6">
							<a href="{{ route('add_role_path') }}" class="btn btn-secondary float-right">Go Back</a>
						</div>
					</div>
				</form>
			@else	
				<h5 class="text-bnb-b"><b>Add New Role</b></h5>
				<form method="POST" action="{{ route('add_role_path') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="role">Role</label>
							<input type="text" id="role" name="role" class="form-control" required="required" placeholder="Role">
						</div>
						<div class="col-md-6 mb-4">
							<label for="role_description">Role Description</label>
							<input type="text" id="role_description" name="role_description" class="form-control" required="required" placeholder="Role Description">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary">Add Role</button>
						</div>
					</div>
				</form>
			@endif
		</div>
	</div>
	@if($key != 'edit')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
			    <thead class="bg-bnb">
			      <tr>
			        <th>Role</th>
			        <th>Role Description</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($roles as $r)
			      	<tr>
				        <td>
				        	<span class="badge {{ $r->role == 'Administrator' ? 'bg-primary' : 'bg-success'}} ">{{$r->role}}</span>
				        </td>
			        	<td>{{$r->description}}</td>
			        	<td class="text-center">
			        		@if($r->role != 'Administrator')
			        		<div class="btn-group">
			        			<a href="{{ route('edit_role_path',$r->id) }}" class="btn btn-primary btn-sm">Edit</a>
			        			<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $r->id }}" data-name="{{ $r->role }}" data-category="role">Delete</a>
			        		</div>
			        		@endif
			        	</td>
			      	</tr>
			      	@endforeach
			    </tbody>
		  	</table>
		</div>
	</div>
	@endif
@endsection