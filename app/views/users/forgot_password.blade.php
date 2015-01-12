@extends('layouts.login')
@section('content') 
    
    <h1>Forgot Password?</h1>
	
	@if (Session::get('error'))
	    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
	@endif

	@if (Session::get('notice'))
	    <div class="alert">{{{ Session::get('notice') }}}</div>
	@endif

    <p align="justify">No worries! just write your email down and we will send you the steps you need to follow to recover your password.</p> 
    <form method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
		<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
		<div class="form-group">
		     <div class="input-append input-group">
		        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
		        <span class="input-group-btn">
		            <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
		        </span>
		    </div>
		</div>
	</form>

	<p align="right" style="margin-top:30px;">
		<a class="btn btn-primary" href="{{  URL::to('users/login') }}">Back to Login</a>
	</p>
@stop