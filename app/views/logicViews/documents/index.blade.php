@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.documents.header', array('param' => '2'))
    
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div style="height:60px;">
            <div style="float:left"><h1>Document Module</h1></div>
            <div style="float:right; margin-top:20px;"><a href="{{ URL::to('solution/index/'.$documents[0]->solution->risksProjects->risk_project_id) }}" class="btn btn-primary">Return to Solutions</a></div>
        </div>
        <h4>Project: {{$documents[0]->solution->risksProjects->project->name}} </h4>
        <h4>Risk: {{$documents[0]->solution->risksProjects->risk->name}} </h4>
        <h4>Solution: {{$documents[0]->solution->description}} </h4>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>File Name</td>
                        <td>File Description</td>
                        <td>Document Type</td>
                        <td colspan="3">Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($documents as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->documentType->name }}</td>
                        <td style="width:2%">
                            <a class="btn btn-success btn-block" target="_blank" href="{{ URL::to($value->getCompleteFileRoute()) }}">
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>  
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

    </div>

@stop
