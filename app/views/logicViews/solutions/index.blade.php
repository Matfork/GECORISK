@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.solutions.header', array('param' => '2'))
    
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Solution Module</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Description</td>
                <td colspan="2">Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($solutions as $key => $value)
            <tr>
                <td style="width:5%">{{ $value->solution_id }}</td>
                <td>{{ $value->description }}</td> 
                <td style="width:10%">
                    <!-- show the nerd (uses the show method found at GET /solutions/{id} -->
                    <!-- <a class="btn btn-small btn-success" href="{{ URL::to('solution/' . $value->solution_id) }}">Show this solution</a> -->

                    <!-- edit this nerd (uses the edit method found at GET /solutions/{id}/edit -->
                    <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('solution/' . $value->solution_id . '/edit') }}">Edit</a>
                </td>
                <td style="width:10%">
                    {{ Form::open(array('url' => 'solution/' . $value->solution_id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@stop