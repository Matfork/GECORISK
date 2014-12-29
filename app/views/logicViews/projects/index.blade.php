@extends('layouts.default')

@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('project') }}">project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('project') }}">View All projects</a></li>
        <li><a href="{{ URL::to('project/create') }}">Add a Project</a>
    </ul>
</nav>

<h1>All the projects</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Begin Date</td>
            <td>End Date</td>
            <td>Finished</td>            
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $key => $value)
        <tr>
            <td>{{ $value->project_id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->getBeginDate() }}</td>
            <td>{{ $value->getEndDate() }}</td>
            <td>{{ $value->getFinished()}}</td>            

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'project/' . $value->project_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this project', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /projects/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->project_id) }}">Show this project</a>

                <!-- edit this nerd (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('project/' . $value->project_id . '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

@stop