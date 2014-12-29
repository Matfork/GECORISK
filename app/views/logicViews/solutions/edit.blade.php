@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('solution') }}">solution Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('solution') }}">View All solution</a></li>
          </ul>
    </nav>

    <h1>Edit {{ $solution->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($solution, array('method' => 'put', 'route' => array('solution.update', $solution->solution_id )) ) }}

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', Input::old('descriṕtion'), array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Edit this solution!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>
@stop