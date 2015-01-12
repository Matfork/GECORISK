@extends('layouts.login')
@section('content')	
   
    <h1>Reset Password</h1> 

    @if (Session::get('error'))
        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif


    <form method="POST" action="{{{ URL::to('/users/reset_password') }}}" accept-charset="UTF-8">

	    <input type="hidden" name="token" value="{{{ $token }}}">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

	    <div class="form-group">
	        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
	    </div>
	    <div class="form-group">
	        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
	    </div>

	  
	    <div class="form-actions form-group">
	        <button type="submit" class="btn btn-primary">Change it!</button>
	    </div>
	</form>   
@stop


        	