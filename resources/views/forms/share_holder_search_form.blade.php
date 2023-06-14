@extends('master.master')
@section('content')
    <div class="row">
        <div class="container-flexible bnb-border mb-2 p-5 form-description text-center">
            <form action="{{route('search_share_holder_information')}}" method="GET">
                @csrf
                <h3 class="form-title">Share Holder Information</h3>	
                <div class="row">	
                    <div class="col-md-5 offset-md-3 mb-3">
                        <input type="text" name="search_parameter" id="search_parameter" class="form-control" autocomplete="off" placeholder="CID Number or CD Code" value="{{old('search_parameter')}}">
                        @error('search_parameter')
                            <span class="bnb-error">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            <br>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </div>  
                </div>
                <small class="input-description">Please enter your CID number or CD Code. If you have already updated the information, the status will be shown as updated. </small>
            </form>
        </div>
    </div>
@endsection