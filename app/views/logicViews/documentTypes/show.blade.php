@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('documentType') }}">documentType Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('documentType') }}">View All documentTypes</a></li>
          </ul>
    </nav>

    <h1>Showing {{ $documentType->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $documentType->name }}</h2>
            <p>
                <strong>NAme:</strong> {{ $documentType->name }}<br>
            </p>
        </div>

    </div>
@stop
