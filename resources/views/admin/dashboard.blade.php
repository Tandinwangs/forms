@extends('master.adminmaster')
@section('content')

	<div class="row">
		<div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
			<div class="row">
				@foreach($forms as $fms)
					@if($fms->model == 'Gift')
						<div class="col-md-6 mb-5">
							<h5 class="text-bnb-b"><b>Recently Submitted Gift Forms</b></h5>
							@if(!blank($gifts))
								<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
									<thead class="bg-bnb">
										<tr>
											<th>Code</th>
											<th>Name</th>
											<th>Submitted On</th>
										</tr>
									</thead>
									@foreach($gifts as $g)
										<tr>
											<td><a href="{{route('show_gift_form_path',[$g->id,'show'])}}">{{$g->code}}</a></td>
											<td>{{$g->name}}</td>
											<td>{{date_format(date_create($g->created_on),"d-M-Y")}}</td>
										</tr>
									@endforeach
								</table>
							@else
								<div class="text-center">
									<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
								</div>
							@endif
						</div>
					@endif
					@if($fms->model == 'PrematureWithdrawal')
						<div class="col-md-6 mb-5">
							<h5 class="text-bnb-b"><b>Recently Submitted Premature Withdrawal Forms</b></h5>
							@if(!blank($premature))
								<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
									<thead class="bg-bnb">
										<tr>
											<th>Code</th>
											<th>Name</th>
											<th>Submitted On</th>
										</tr>
									</thead>
									@foreach($premature as $p)
										<tr>
											<td><a href="{{route('show_premature_withdrawal_form_path',[$p->id,'show'])}}"> {{$p->code}}</a></td>
											<td>{{$p->name}}</td>
											<td>{{date_format(date_create($p->created_on),"d-M-Y")}}</td>
										</tr>
									@endforeach
								</table>
							@else
								<div class="text-center">
									<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
								</div>
							@endif
						</div>
					@endif

					@if($fms->model == 'INRRemittance')
						<div class="col-md-6 mb-5">
							<h5 class="text-bnb-b"><b>Recently Submitted INR Remittance Forms</b></h5>
							@if(!blank($remittance))
								<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
									<thead class="bg-bnb">
										<tr>
											<th>Code</th>
											<th>Name</th>
											<th>Submitted On</th>
										</tr>
									</thead>
									@foreach($remittance as $r)
										<tr>
											<td><a href="{{route('show_inr_remittance_form_path',[$r->id,'show'])}}">{{$r->code}}</a></td>
											<td>{{$r->name}}</td>
											<td>{{date_format(date_create($r->created_on),"d-M-Y")}}</td>
										</tr>
									@endforeach
								</table>
							@else
								<div class="text-center">
									<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
								</div>
							@endif
						</div>
					@endif

					@if($fms->model == 'DebitCardRequest')
						<div class="col-md-6 mb-5">
							<h5 class="text-bnb-b"><b>Recently Submitted Debit Card Request Forms</b></h5>
							@if(!blank($debitcards))
								<table class="table table-striped table-bordered table-hover table-responsive-sm table-sm">
									<thead class="bg-bnb">
										<tr>
											<th>Code</th>
											<th>Name</th>
											<th>Submitted On</th>
										</tr>
									</thead>
									@foreach($debitcards as $r)
										<tr>
											<td><a href="{{route('show_debit_card_request_form_path',[$r->id,'show'])}}">{{$r->code}}</a></td>
											<td>{{$r->name}}</td>
											<td>{{date_format(date_create($r->created_on),"d-M-Y")}}</td>
										</tr>
									@endforeach
								</table>
							@else
								<div class="text-center">
									<img src="{{asset('images/nrf.png')}}" style="max-height:200px; ">
								</div>
							@endif
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@endsection