@extends('layouts.default')

@section('content')

     <!-- Using Handlebar template, we put the script in a separte file just to mantain clean code -->
    @include('includes.handleBarRiskProject')

     <script>
        $(function(){
            GeneralJS.initGeneralSetUp();
            RiskProjectJS.initialSetUp();
        });
    </script>

    <div class="container">
        @include('includes.logicViews.risksProjects.header', array('param' => '2'))

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="alert alert-info ajaxMsg" style="display:none"></div>

        <h1>Risk Project Module</h1>

        <div class="description_module">
            <h5>In the following tables you will see the list of projects which have been linked with some risks through the timelife of the application. <h5>
            <h5>Also as a user of GecoRisk you can create, edit, delete links and add solutions to already registered links.</h5>
        </div>


        <div class="row inputFilers">
            <div class="col-md-4 form-group">
                {{ Form::label('filter_risk_project', 'Search Risk or Project') }}
                {{ Form::text('filter_risk_project', '', array('class' => 'form-control')) }}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('filter_project', 'Filter by Project') }}
                {{ Form::select('filter_project', array('0' => '----- All Projects -----') + Project::lists('name','project_id'), isset($filterProject)?$filterProject:0, array('class' => 'form-control filters')) }}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('filter_risk', 'Filter by Risk') }}
                {{ Form::select('filter_risk', array('0' => '----- All Risks -----') + Risk::lists('name','risk_id'), isset($filterRisk)?$filterRisk:0 , array('class' => 'form-control filters')) }}
            </div>           
        </div>

        <div class="content_form">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Project</td>
                            <td>Risk</td>
                            <td>Description</td>
                            <td>Probabilty</td>
                            <td>Impact</td>
                            <td colspan="4">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($riskProjects as $key => $value)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $value->project->name }}</td>
                            <td>{{ $value->risk->name }}</td>
                            <td>{{ $value->description}}</td>
                            <td>{{ $value->probability }}</td>
                            <td>{{ $value->impact }}</td>
                
                            <td style="width:10%;">
                                @if(count($value->solutions)>0)
                                    <a class="btn btn-small btn-info2 btn-block" href="{{ URL::to('solution/index/'.$value->risk_project_id) }}">{{count($value->solutions)}} Solutions</a>
                                @else
                                    <span class="btn btn-small btn-info2 btn-block" >No Solutions Yet</span>
                                @endif
                            </td>
                             <td style="width:10%;">
                                <a class="btn btn-small btn-primary btn-block" href="{{ URL::to('solution/create/'.$value->risk_project_id) }}">+ Solution</a>
                            </td>
                
                             <!-- we will also add show, edit, and delete buttons -->
                            <td  style="width:2%;">
                
                                <!-- show the nerd (uses the show method found at GET /riskprojects/{id} -->
                                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('riskProject/' . $value->risk_project_id) }}">Show this riskproject</a> -->
                
                                <!-- edit this nerd (uses the edit method found at GET /riskprojects/{id}/edit -->
                                <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('riskProject/' . $value->risk_project_id. '/edit') }}">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td >
                            <td style="width:2%;">
                                 <!-- With this we call a general modal to delete information, but we provide to that modal what we want to delete-->
                                {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 
                                    array('data-deleteContentInfo'=>'Are you Sure you want to delete the selected Link? There is not turning back!',
                                          'data-toDelete'=>'riskProject/' . $value->risk_project_id,'data-toggle'=>'modal',
                                          'data-target'=>'#confirm-delete','type'=>'button' 
                                          , 'class' => 'btn btn-danger btn-block')) 
                                }} 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="paginationButtoms">
                {{ $riskProjects->links() }}
            </div>
        </div>

    </div>
@stop