@extends('layouts.default')

@section('content')
    <script>
     $(function(){
            FrecuencyJS.initialDocumentSetUp();
        });
    </script>
    <div class="container">

       @include('includes.logicViews.frecuency.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h1>Document Main</h1>
        
        <table id="tableDocumentMain" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Project</td>
                    <td>Risk</td>
                    <td>Solution</td>
                    <td>File Name</td>
                    <td>File Descripcion</td>
                    <td>Document Type</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($documents as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->solution->risksProjects->project->name }}</td>
                    <td>{{ $value->solution->risksProjects->risk->name }}</td>
                    <td>{{ $value->solution->description }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->documentType->name }}</td>
                
                    <td style="width:%">
                        <a class="btn btn-success btn-block" target="_blank" href="{{ URL::to($value->getCompleteFileRoute()) }}">
                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>  
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@stop
