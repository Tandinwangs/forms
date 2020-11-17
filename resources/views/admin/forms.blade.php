@extends('master.adminmaster')
@section('content')
	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<div class="row">
				@if($user->role->role == 'Administrator')
					@foreach($forms as $f)
						<div class="col-md-6 mb-3">
							<a href="{{route($f->form_path)}}" class="no-decoration">
								<div class="form-container">
									<h1>{{ $f->form }}</h1>
									<hr>
									<h4>{{$f->description}}</h4>
								</div>
							</a>
						</div>
					@endforeach
				@else
					@foreach($forms as $f)
						<div class="col-md-6 mb-3">
							<a href="{{route($f->form->form_path)}}" class="no-decoration">
								<div class="form-container">
									<h1>{{ $f->form->form }}</h1>
									<hr>
									<h4>{{$f->form->description}}</h4>
								</div>
							</a>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection