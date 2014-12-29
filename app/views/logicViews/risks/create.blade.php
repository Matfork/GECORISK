@extends('layouts.default')

@section('content')
    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('risk') }}">risk Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('risk') }}">View All risks</a></li>
            <li><a href="{{ URL::to('risk/create') }}">Create a risk</a>
        </ul>
    </nav>

    <h1>Create a risk</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'risk')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('riskType_id', 'risk Level') }}
            {{ Form::select('riskType_id', RiskType::lists('name','riskType_id'), Input::old('riskType_id'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create the risk!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>
@stop