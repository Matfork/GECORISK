@extends('layouts.default')

@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('project') }}">project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('project') }}">View All projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Add a project</a>
    </ul>
</nav>

<h1>Showing {{ $project->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $project->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $project->description }}<br>
            <strong>Begin Date:</strong> {{ $project->getBeginDate() }}<br>
            <strong>End Date:</strong> {{ $project->getEndDate() }}<br>
            <strong>Finished:</strong> {{ $project->getFinished() }}<br>
        </p>
    </div>

</div>

@stop
