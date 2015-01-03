@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.documentTypes.header', array('param' => '2')) 

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Document Types Module</h1>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
        @foreach($documentTypes as $key => $value)
            <tr>
                <td style="width:5%;">{{ $value->documentType_id }}</td>
                <td>{{ $value->name }}</td>

                <td style="width:10%;">

                    <!-- show the nerd (uses the show method found at GET /documentTypes/{id} -->
                    <!-- <a class="btn btn-small btn-success" href="{{ URL::to('documentType/' . $value->documentType_id) }}">Show this documentType</a> -->

                    <!-- edit this nerd (uses the edit method found at GET /documentTypes/{id}/edit -->
                    <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('documentType/' . $value->documentType_id . '/edit') }}">Edit</a>

                </td>
                <!-- we will also add show, edit, and delete buttons -->
                <td style="width:10%;">

                    <!-- delete the nerd (uses the destroy method DESTROY /documentTypes/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     {{ Form::open(array('url' => 'documentType/' . $value->documentType_id)) }}
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