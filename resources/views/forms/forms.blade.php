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
			</div>
		</div>
	</div>
@endsection