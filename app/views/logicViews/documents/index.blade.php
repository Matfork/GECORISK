@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.documents.header', array('param' => '2'))
    
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h1>Document Module</h1>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>NameFile</td>
                    <td>Description</td>
                    <td>Document Type</td>
                    <td>Solution</td>
                    <td>File</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($documents as $key => $value)
                <tr>
                    <td>{{ $value->document_id }}</td>
                    <td>{{ $value->nameFile }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->documentType->name }}</td>
                    <td>{{ $value->solution->description }}</td>
                
                    <td>
                        {{ link_to($value->getCompleteFileRoute(), 'Link', array('class' => 'btn btn-success btn-block') ) }} 
                    </td>

                    <td style="width:2%">
                        <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('document/' . $value->document_id . '/edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td style="width:2%">
                        {{ Form::open(array('url' => 'document/' . $value->document_id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type'=>'submit' , 'class' => 'btn btn-danger btn-block')) }}
                        {{ Form::close() }}
                     </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@stop
