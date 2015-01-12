@extends('layouts.default')
@section('content')

	<div class="index">
		<h1>Welcome to GecoRisk!</h1>
		<h3>User Logged: {{Confide::user()->first_name." ".Confide::user()->middle_name}}</h3>
	</div>

	<div class="index_update_info">

		<p align="justify" style="margin-bottom:30px"> If you want, you can change your personal info in this form, make sure to remember your new password if you are planning to change it:</p>

		<!-- will be used to show any messages -->
	     @if (Session::has('message'))
	        <div class="alert alert-info">{{ Session::get('message') }}</div>
	     @endif

		 <!-- will be used to show any messages -->
	     @if (HTML::ul($errors->all()))
	        <div class="alert alert-danger">{{ HTML::ul($errors->all()) }}</div>
	     @endif

		<form method="POST" action="{{{ URL::to('users/update') }}}" accept-charset="UTF-8">

		    <fieldset>
		        <div class="row">
		        	<div class="col-md-6 form-group">
		        	    <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{ Confide::user()->username }}" readonly>
		        	</div>

		        	<div class="col-md-6 form-group">
			            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Confide::user()->email }}}" readonly>
			        </div>
		        </div>

				<div class="form-group">
		            <input class="form-control" placeholder="Current Password" type="password" name="current_password" id="current_password">
		        </div>
		       
	
		        <div class="row">
		        	<div class="col-md-6 form-group">
		        	  	<input class="form-control" placeholder="New Password" type="password" name="new_password" id="new_password">
		      		</div>

		        	<div class="col-md-6 form-group">
			            <input class="form-control" placeholder="Repeat New Passowrd" type="password" name="new_password_confirmation" id="new_password_confirmation">
		        	</div>
		        </div>

				<!-- Custom attributes -->
		        <div class="form-group">
		            <input class="form-control" placeholder="Names" type="text" name="first_name" id="first_name" value="{{{ Confide::user()->first_name }}}">
		        </div>

		        <div class="form-group">
		            <input class="form-control" placeholder="Middle names" type="text" name="middle_name" id="middle_name" value="{{{ Confide::user()->middle_name }}}">
		        </div>
		        <!-- end -->

		        <div class="form-actions form-group">
		          <button type="submit" class="btn btn-success">Update my info!</button>
		        </div>

		    </fieldset>
		</form>
	</div>
@stop