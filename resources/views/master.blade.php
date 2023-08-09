<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="{{ asset('images/BNB Logo.png')}}">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Bhutan National Bank Limited | Forms</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!-- CSS Files -->
	<link href="{{asset('/css/style.css')}}" rel="stylesheet" />
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/css/all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
	

</head>
<body class="reed">
	<div class="container p-2">
		<div class="row">
			<div class="container-flexible flex-center bnb-border-header mb-2">
				<img src="{{asset('/images/header.png')}}" class="p-2" style="max-width: 100%;">
			</div>		
		</div>
		
		@yield('content')

		<div class="row">
			<div class="container-flexible bnb-border-footer p-5 text-center">
				<h4 class="form-footer">Your Relationship Bank</h4>
			</div>		
		</div>
	</div>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
  	<script src="{{ asset('js/popper.min.js') }}"></script> -->
</body>
</html>