@extends('layouts.default')

@section('content')

    <script type="text/javascript" src="{{ url('assets/bower_components/datatables-bootstrap3/BS3/assets/js/datatables.js') }}"></script>    
    <link rel="stylesheet" href="{{ url('assets/bower_components/datatables-bootstrap3/BS3/assets/css/datatables.css') }}">

    <script type="text/javascript" src="{{ url('assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>    
    <link rel="stylesheet" href="{{ url('assets/bower_components/datatables-tabletools/css/dataTables.tableTools.css') }}">

    <script>
     $(function(){
            FrecuencyJS.initialDocumentSetUp();
            $(".selectForms").html('<?php echo "<div class="."col-md-6"."> <b>Filter by Risk:</b>". Form::select("selectRisk", [""=>"---- All ----"] + Risk::lists("name","name"), 0, array("id" => "selectRisk")) ."</div>" ?>');
            $(".selectForms").append('<?php echo "<div class="."col-md-6"."> <b>Filter by Project:</b> ". Form::select("selectProject", [""=>"---- All ----"] + Project::lists("name","name"), 0, array("id" => "selectProject")) ."</div>" ?>');
        });

    </script>

    <div class="container">

       @include('includes.logicViews.frecuency.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div style="height:75px;">
            <div style="float:left"> <h1>Document Main</h1></div>
            <div class="exportNav">
            </div>
        </div>
        
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
