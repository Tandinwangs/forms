@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description">
			@if($key == 'edit')
				<h5 class="text-bnb-b"><b>Edit User</b></h5>
				<form method="POST" action="{{ route('edit_user_path',$usr->id) }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="name">Full Name</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Full Name of the User" value="{{$usr->name}}">
							@error('name')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-6">
							<label for="username">UserName</label>
							<input type="text" id="username" name="username" class="form-control" placeholder="UserName" value="{{$usr->username}}">
							@error('username')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Email ID of the User" value="{{$usr->email}}">
							@error('email')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-6">
							<label for="mobile">Mobile Number</label>
							<input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number" value="{{$usr->mobile}}">
							@error('mobile')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="inner-container">
						<div class="row mb-3">
							<div class="col-12">
								<span class="bnb-b-span">
	                                <small><strong> &nbsp; For Password Reset Only. &nbsp; </strong></small>
	                            </span>
							</div>
							<div class="col-md-6">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}">
								@error('password')
		                            <span class="bnb-error">
		                                <small><strong>{{ $message }}</strong></small>
		                            </span>
		                        @enderror
							</div>
							<div class="col-md-6">
								<label for="password_confirmation">Confirm Password</label>
								<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
							</div>
						</div>
					</div>
					@if($usr->role->role != 'Administrator')
						<div class="row mb-4">
							<div class="col-md-6">
								<label for="role">Role</label>
								<select name="role" id="role" class="form-control">
									<option value="">Select User Role</option>
									@foreach($roles as $r)
										<option value="{{$r->id}}" {{ $r->id == $usr->role_id ? "selected" : "" }}>{{$r->role}}</option>
									@endforeach
								</select>
								@error('role')
		                            <span class="bnb-error">
		                                <small><strong>{{ $message }}</strong></small>
		                            </span>
		                        @enderror
							</div>

							<div class="col-md-6">
								<label for="branch">Branch</label>
								<select name="branch" id="branch" class="form-control">
									<option value="">Select User Branch</option>
									@foreach($branches as $r)
										<option value="{{$r->id}}" {{ $r->id == $usr->branch_id ? "selected" : "" }}>{{$r->branch_name}}</option>
									@endforeach
								</select>
								@error('branch')
		                            <span class="bnb-error">
		                                <small><strong>{{ $message }}</strong></small>
		                            </span>
		                        @enderror
							</div>
						</div>
					@endif
					<div class="row">
						<div class="col-6">
							<button class="btn btn-primary">Update User / Change Password</button>
						</div>
						<div class="col-6">
							<a href="{{ route('users_path') }}" class="btn btn-secondary float-right">Go Back</a>
						</div>
					</div>
				</form>
			@else
				<h5 class="text-bnb-b"><b>Add New User</b></h5>
				<form method="POST" action="{{ route('add_user_path') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="name">Full Name</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Full Name of the User" value="{{old('name')}}">
							@error('name')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-6">
							<label for="username">UserName</label>
							<input type="text" id="username" name="username" class="form-control" placeholder="UserName" value="{{old('username')}}">
							@error('username')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Email ID of the User" value="{{old('email')}}">
							@error('email')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-6">
							<label for="mobile">Mobile Number</label>
							<input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number" value="{{old('mobile')}}">
							@error('mobile')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}">
							@error('password')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-6">
							<label for="password_confirmation">Confirm Password</label>
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-6">
							<label for="role">Role</label>
							<select name="role" id="role" class="form-control">
								<option value="">Select User Role</option>
								@foreach($roles as $r)
									<option value="{{$r->id}}" {{ $r->id == old("role") ? "selected" : "" }}>{{$r->role}}</option>
								@endforeach
							</select>
							@error('role')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>

						<div class="col-md-6">
							<label for="branch">Branch</label>
							<select name="branch[]" id="branch" class="form-control" multiple>
								<option value="">Select User Branch</option>
								@foreach($branches as $r)
									<option value="{{$r->id}}" {{ in_array($r->id, old("branch", [])) ? "selected" : "" }}>{{$r->branch_name}}</option>
								@endforeach
							</select>
							@error('branch')
								<span class="bnb-error">
									<small><strong>{{ $message }}</strong></small>
								</span>
							@enderror
						</div>

					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary">Add User</button>
						</div>
					</div>
				</form>
			@endif
		</div>
	</div>
@endsection