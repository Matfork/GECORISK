@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.riskTypes.header', array('param' => '2')) 


    <h1>Risk Types Module</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td colspan="2">Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($riskTypes as $key => $value)
            <tr>
                <td style="width:5%">{{ $value->riskType_id }}</td>
                <td>{{ $value->name }}</td>
                <td style="width:10%">

                    <!-- show the nerd (uses the show method found at GET /riskTypes/{id} -->
                    <!-- <a class="btn btn-small btn-success" href="{{ URL::to('riskType/' . $value->riskType_id) }}">Show this riskType</a> -->

                    <!-- edit this nerd (uses the edit method found at GET /riskTypes/{id}/edit -->
                    <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('riskType/' . $value->riskType_id . '/edit') }}">Edit</a>
                </td>
                <td style="width:10%">
                    <!-- delete the nerd (uses the destroy method DESTROY /riskTypes/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     {{ Form::open(array('url' => 'riskType/' . $value->riskType_id )) }}
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