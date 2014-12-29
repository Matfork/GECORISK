@extends('layouts.default')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('document') }}">document Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('document') }}">View All documents</a></li>
            <li><a href="{{ URL::to('document/create') }}">Add a document</a>
        </ul>
    </nav>

    <h1>All the documents</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Description</td>
                <td>NameFile</td>
                <td>PathFile</td>
                <td>Document Type</td>
                <td>Solution</td>
                <td>File</td>
            </tr>
        </thead>
        <tbody>
        @foreach($documents as $key => $value)
            <tr>
                <td>{{ $value->document_id }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->nameFile }}</td>
                <td>{{ $value->pathFile }}</td>
                <td>{{ $value->documentType->name }}</td>
                <td>{{ $value->solution->description }}</td>
            
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /documents/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     {{ Form::open(array('url' => 'document/' . $value->document_id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this document', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /documents/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('document/' . $value->document_id) }}">Show this document</a> 

                    <!-- edit this nerd (uses the edit method found at GET /documents/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('document/' . $value->document_id . '/edit') }}">Edit this Nerd</a>
                </td>
                <td>
                    {{ link_to($value->getCompleteFileRoute(), 'Link') }} 
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

@stop
