@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('indicator') }}">indicator Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('indicator') }}">View All indicators</a></li>
          </ul>
    </nav>

    <h1>Showing {{ $indicator->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $indicator->name }}</h2>
            <p>
                <strong>Minimum:</strong> {{ $indicator->min_indicator }}<br>
                <strong>Maximum:</strong> {{ $indicator->max_indicator }}<br>
                <strong>Color:</strong> {{ $indicator->color }}<br>
            </p>
        </div>

    </div>

@stop

