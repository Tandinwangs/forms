@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			@if($key == 'edit')
				<h5 class="text-bnb-b"><b>Edit Form</b></h5>
				<form method="POST" action="{{ route('edit_form_path',$form->id) }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-4 mb-3">
							<label for="form">Form Name</label>
							<input type="text" id="form" name="form" class="form-control" placeholder="Form Name" value="{{$form->form}}">
							@error('form')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="description">Form Description</label>
							<input type="text" id="description" name="description" class="form-control" placeholder="Form Description" value="{{ $form->description }}">
							@error('description')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="model">Linked Model</label>
							<input type="text" id="model" name="model" class="form-control" placeholder="linked Model" value="{{$form->model}}">
							@error('model')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="form_path">Form Path</label>
							<input type="text" id="form_path" name="form_path" class="form-control" placeholder="Form Path" value="{{$form->form_path}}">
							@error('form_path')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="client_path">Client Path</label>
							<input type="text" id="client_path" name="client_path" class="form-control" placeholder="Client Path" value="{{$form->client_path}}">
							@error('client_path')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary">Update Form</button>
						</div>
					</div>
				</form>
			@else
				<h5 class="text-bnb-b"><b>Add New Form</b></h5>
				<form method="POST" action="{{ route('add_form_path') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-md-4 mb-3">
							<label for="form">Form Name</label>
							<input type="text" id="form" name="form" class="form-control" placeholder="Form Name">
							@error('form')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="description">Form Description</label>
							<input type="text" id="description" name="description" class="form-control" placeholder="Form Description">
							@error('description')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="model">Linked Model</label>
							<input type="text" id="model" name="model" class="form-control" placeholder="linked Model">
							@error('model')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="form_path">Form Path</label>
							<input type="text" id="form_path" name="form_path" class="form-control" placeholder="Form Path">
							@error('form_path')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
						<div class="col-md-4 mb-3">
							<label for="client_path">Client Path</label>
							<input type="text" id="client_path" name="client_path" class="form-control" placeholder="Client Path">
							@error('client_path')
	                            <span class="bnb-error">
	                                <small><strong>{{ $message }}</strong></small>
	                            </span>
	                        @enderror
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-primary">Add Form</button>
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
				        	<th>Form</th>
				        	<th>Form Description</th>
				        	<th>Linked Model</th>
				        	<th>Form Path</th>
				        	<th>Client Path</th>
				        	<th>Action</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@foreach($forms as $f)
						    <tr>
						        <td>
						        	{{$f->form}}
						        </td>
						        <td><small>{{$f->description}}</small></td>
						        <td><small>{{$f->model}}</small></td>
						        <td><small>{{$f->form_path}}</small></td>
						        <td><small>{{$f->client_path}}</small></td>
						        <td class="text-center">
						        	<div class="btn-group">
						        		<a href="{{route('edit_form_path',$f->id)}}" class="btn btn-primary btn-sm">Edit</a>
						        		<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{ $f->id }}" data-name="{{ $f->form }}" data-category="form">Delete</a>
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