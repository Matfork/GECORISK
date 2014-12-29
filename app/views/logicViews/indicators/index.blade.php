@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('indicator') }}">Indicator Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('indicator') }}">View All indicators</a></li>
             @if(count($indicators) < 3)
                <li><a href="{{ URL::to('indicator/create') }}">Add a indicator</a>
             @endif
        </ul>
    </nav>

    <h1>All the indicators</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Minimun</td>
                <td>Maximum</td>
                <td>Color</td>
            </tr>
        </thead>
        <tbody>
        @foreach($indicators as $key => $value)
            <tr>
                <td>{{ $value->indicator_id }}</td>
                <td>{{ $value->min_indicator }}</td>
                <td>{{ $value->max_indicator }}</td>
                <td>{{ $value->color }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /indicators/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     {{ Form::open(array('url' => 'indicator/' . $value->indicator_id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this indicator', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /indicators/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('indicator/' . $value->indicator_id) }}">Show this indicator</a>

                    <!-- edit this nerd (uses the edit method found at GET /indicators/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('indicator/' . $value->indicator_id . '/edit') }}">Edit this Nerd</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

@stop