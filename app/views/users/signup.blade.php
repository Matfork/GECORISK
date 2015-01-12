@extends('layouts.login')
@section('content')

    <h1>Signup Gecorisk</h1> 
	
	@if (Session::get('error'))
        <div class="alert alert-error alert-danger">
            @if (is_array(Session::get('error')))
                {{ head(Session::get('error')) }}
            @endif
        </div>
    @endif

    @if (Session::get('notice'))
        <div class="alert">{{ Session::get('notice') }}</div>
    @endif

    <form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

	    <fieldset>
	        <div class="form-group">
	            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
	        </div>
	        <div class="form-group">
	            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
	        </div>
	        <div class="form-group">
	            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
	        </div>
	        <div class="form-group">
	            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
	        </div>

			<!-- Custom attributes -->
	        <div class="form-group">
	            <input class="form-control" placeholder="Names" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name') }}}">
	        </div>

	        <div class="form-group">
	            <input class="form-control" placeholder="Middle names" type="text" name="middle_name" id="middle_name" value="{{{ Input::old('middle_name') }}}">
	        </div>
	        <!-- end -->
	        

	        <div class="form-actions form-group">
	          <button type="submit" class="btn btn-success">Join Us!</button>
	        </div>

	    </fieldset>
	</form>

	<div>
		or <a class="" href="{{  URL::to('users/login') }}">log in</a> if you are already a member.
	</div>
@stop