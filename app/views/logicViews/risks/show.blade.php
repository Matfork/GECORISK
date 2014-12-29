@extends('layouts.default')

@section('content')
    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('risk') }}">Risk Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('risk') }}">View All risks</a></li>
            <li><a href="{{ URL::to('risk/create') }}">Create a Risk</a>
        </ul>
    </nav>

    <h1>Showing {{ $risk->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $risk->name }}</h2>
            <p>
                <strong>Description:</strong> {{ $risk->description }}<br>
                <strong>Risk:</strong> {{ $risk->riskType->name }}
            </p>
        </div>

    </div>

@stop
