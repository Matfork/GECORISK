@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('solution') }}">solution Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('solution') }}">View All solutions</a></li>
          </ul>
    </nav>

    <h1>Showing {{ $solution->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $solution->description }}</h2>
            <p>
                <strong>Description:</strong> {{ $solution->name }}<br>
            </p>
        </div>

    </div>
@stop

