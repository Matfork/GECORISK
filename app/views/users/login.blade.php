@extends('layouts.login')
@section('content')
    
    <h1>Login Gecorisk</h1> 
 
    @if (Session::get('error'))
        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if (Session::get('notice'))
        <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
    @endif


    <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
	   
	    <fieldset>
	        <div class="form-group">
	            <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
	        </div>

	        <div class="form-group">
		        <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
	        </div>
		        
	        <div class="row">
		        <div class="col-md-6 checkbox">
		            <label for="remember">
		                <input type="hidden" name="remember" value="0">
		                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
		            </label>
		        </div>
		        <div class="col-md-6">
		        	<button tabindex="3" type="submit" class="btn btn-block btn-success">{{{ Lang::get('confide::confide.login.submit') }}}</button>
				</div>
	        </div>
		
	    </fieldset>
	</form>
	
    <p class="help-block" style="margin-top:30px;">
    	Forgot your password? No problem! go <a href="{{{ URL::to('/users/forgot_password') }}}">here!</a>
	</p>
	<p class="help-block">
    	or Are you new to GecoRisk?, then <a class="" href="{{  URL::to('users/create') }}">Sign up!</a>
	</p>

@stop