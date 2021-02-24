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
	<link href="{{asset('/css/print.css')}}" rel="stylesheet" type="text/css" media="print" />

</head>
<body class="reed">
	<div class="container p-2">
		<div class="row">
			<div class="container-flexible flex-center bnb-border-header mb-2">
				<img src="{{asset('/images/header.png')}}" class="p-2" style="max-width: 100%;">
			</div>		
		</div>
		<nav class="navbar navbar-expand-sm navdesign sticky-top mb-2">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link {{ $active == 'db' ? 'active':'' }}" href="{{route('dashboard_path')}}">Dashboard</a>
				</li>
				@if($user->role->role == 'Administrator')
				<li class="nav-item">
					<a class="nav-link {{ $active == 'u' ? 'active':'' }}" href="{{route('users_path')}}">User Management</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ $active == 'raf' ? 'active':'' }}" href="{{route('rolesandforms_path')}}">Roles &amp; Forms</a>
				</li>
				<li class="nav-item dropdown">
			      	<a class="nav-link {{ $active == 's' ? 'active':'' }} dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			        Settings
			      	</a>
			      	<div class="dropdown-menu">
			        	<a class="dropdown-item" href="{{route('add_user_path')}}">Add User</a>
			        	<hr>
			        	<a class="dropdown-item" href="{{route('add_role_path')}}">Add Role</a>
			        	<hr>
			        	<a class="dropdown-item" href="{{route('add_form_path')}}">Add Form</a>
						<hr>
			        	<a class="dropdown-item" href="{{route('notifiers_path')}}">Notifiers</a>
			      	</div>
			    </li>
			    @endif
			    <li class="nav-item">
					<a class="nav-link {{ $active == 'f' ? 'active':'' }}" href="{{route('forms_path')}}">Forms</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
			      	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			        {{$user->name}}
			      	</a>
			      	<div class="dropdown-menu">
			      		<p class="dropdown-item text-center">
			      			User Name : {{$user->username}}<br>
			      			Email ID : {{$user->email}}<br>
			      			Mobile Number : {{$user->mobile}}
			      		</p>
			      		<hr>
			        	<a class="dropdown-item" href="{{ route('change_password_path') }}">Password Change</a>
			        	<hr>
			        	<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
			      	</div>
			    </li>
			</ul>
		</nav>

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


	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
	      		</div>
	      		<div class="modal-body">
	      			<p class="mb-5">Are your sure you want to delete ??</p>
	        		<form method="post" action="{{ route('remove_components_path') }}">
	        			@method('delete')
	        			@csrf
	          			<input type="hidden" name="id" id="id" >
	          			<input type="hidden" name="category" id="category" >
	          			<button type="button" class="btn btn-secondary float-left" data-dismiss="modal">No, Cancel</button>
	        			<button type="submit" class="btn btn-primary float-right">Yes, Proceed</button>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="statusModalLabel"></h5>
	      		</div>
	      		<div class="modal-body">
	      			<p class="mb-3"></p>
	        		<form method="post" action="{{ route('change_form_status_path') }}">
	        			@csrf
	          			<input type="hidden" name="id" id="id">
	          			<input type="hidden" name="category" id="category">
	          			<input type="hidden" name="action" id="action">
	          			<div id="reject"></div>
	          			<hr>
	          			<button type="button" class="btn btn-secondary float-left" data-dismiss="modal">No, Cancel</button>
	        			<button type="submit" class="btn btn-primary float-right">Yes, Proceed</button>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
  	<script src="{{ asset('js/popper.min.js') }}"></script>
  	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/alert.js') }}"></script>
</body>
</html>