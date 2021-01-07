@extends('master.adminmaster')
@section('content')
	
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
			    <thead class="bg-bnb">
			      <tr>
			        <th>Roles</th>
			        <th>Linked Forms</th>
			        <th>Un-Linked Form</th>
			      </tr>
			    </thead>
			    <tbody>
			      	@foreach($rafs as $r)
				      	<tr>
					        <td><span class="badge bg-primary">{{$r->role}}</span></td>
					        <td class="text-center">
					        	@foreach($r->forms as $f)
					        		<a href="{{ route('unlink_form_path',$f->id) }}" class="bnb-btn-y" data-toggle="tooltip" title="Un-Link the form {{$r->role}} Role"><small>{{ $f->form->form }}</small></a>
					        	@endforeach
					        </td>
					        <td class="text-center">
			        			@foreach($forms as $fm)
					        		<a href="{{ route('link_form_path',[$r->id,$fm->id]) }}" class="bnb-btn-b" data-toggle="tooltip" title="Link the form to {{$r->role}} Role"><small>{{$fm->form}}</small></a>
					        	@endforeach
					        </td>
					    </tr>
			      	@endforeach
			    </tbody>
		  	</table>
		</div>
	</div>
@endsection