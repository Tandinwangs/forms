@extends('master.master')
@section('content')
    <div class="row">
        <div class="container-flexible bnb-border mb-2 p-5 form-description-raleway">
            <div class="col-sm-6 offset-sm-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="username">User Name:</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required placeholder="User Name" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">              
                        <button class="btn btn-primary btn-block btn-lg">Login</button> 

                        <p>
                            Forgot your password? <a href="{{ route('otp_path',['action'=>'reset']) }}">Reset Here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection