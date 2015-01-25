@extends('layouts.default')

@section('content')
    
    <script>
        $(function () {
            GeneralJS.initGeneralSetUp();
            DocumentJS.initDocumentSetUp();
        });
    </script>

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

        <div class="description_module">
            <h5>In the following table you will see all the documents uploaded to the specific solution of the link decribed below. <h5>
            <h5> Also as a user of GecoRisk you can create, update, delete and of course, download the documents.</h5>
        </div>
        
        <div class="table-responsive">
            <table id="tableDocuments" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td rowspan="2">#</td>
                        <td rowspan="2">File Name</td>
                        <td rowspan="2">File Description</td>
                        <td rowspan="2">Document Type</td>
                        <td colspan="3">Actions</td>
                    </tr>
                     <!-- trick for datatable colspan issue -->
                    <tr style="display:none;">
                        <th></th>
                        <th></th>
                        <th></th>
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

                             <!-- With this we call a general modal to delete information, but we provide to that modal what we want to delete-->
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 
                                array('data-deleteContentInfo'=>'Are you Sure you want to delete the selected Document? There is not turning back!',
                                      'data-toDelete'=>'document/' . $value->document_id,'data-toggle'=>'modal',
                                      'data-target'=>'#confirm-delete','type'=>'button' 
                                      , 'class' => 'btn btn-danger btn-block')) 
                            }} 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@stop
