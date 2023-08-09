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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            

</head>
<body class="reed">
	<div class="container p-2">
		<div class="row">
			<div class="container-flexible flex-center bnb-border-header mb-2">
				<img src="{{asset('/images/header.png')}}" class="p-2" style="max-width: 100%;">
			</div>		
		</div>
		@if(session('status')=="1")
            <div class="alert bnb-b alert-dismissible" role="alert">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
               	{{ session('msg') }}
            </div>
        @endif
        @if(session('status')=="0")
            <div class="alert bnb-y alert-dismissible" role="alert">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('msg') }}
            </div>
        @endif
		
		@yield('content')

		<div class="row">
			<div class="container-flexible bnb-border-footer p-5 text-center">
				<h4 class="form-footer">Your Relationship Bank</h4>
				<small class="form-description-raleway"><b class="text-bnb-b">Copyright &copy; All Rights Reserved</b></small>
			</div>		
		</div>
	</div>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
  	<script src="{{ asset('js/popper.min.js') }}"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --> 
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/alert.js') }}"></script>
	<script src="{{ asset('js/jq.js') }}"></script>
</body>
</html>