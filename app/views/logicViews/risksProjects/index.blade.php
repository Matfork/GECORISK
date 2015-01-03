@extends('layouts.default')

@section('content')

     <!-- Using Handlebar template, we put the script in a separte file just to mantain clean code -->
    @include('includes.handleBarRiskProject')

     <script>
        $(function(){
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

         <h1>Risk Project Menu</h1>

        <div class="row inputFilers">
            <div class="col-md-4 form-group">
                {{ Form::label('filter_risk_project', 'Search Risk or Project') }}
                {{ Form::text('filter_risk_project', '', array('class' => 'form-control')) }}
            </div>
            <div class="col-md-4 form-group">
                {{ Form::label('filter_risk', 'Filter by Risk') }}
                {{ Form::select('filter_risk', array('0' => '----- All Risks -----') + Risk::lists('name','risk_id'), isset($filterRisk)?$filterRisk:0 , array('class' => 'form-control filters')) }}
            </div>
             <div class="col-md-4 form-group">
                {{ Form::label('filter_project', 'Filter by Project') }}
                {{ Form::select('filter_project', array('0' => '----- All Projects -----') + Project::lists('name','project_id'), isset($filterProject)?$filterProject:0, array('class' => 'form-control filters')) }}
            </div>
        </div>

        <div class="content_form">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Risk</td>
                        <td>Project</td>
                        <td>Description</td>
                        <td>Probabilty</td>
                        <td>Impact</td>
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($riskProjects as $key => $value)
                    <tr>
                        <td>{{ $value->risk_project_id}}</td>
                        <td>{{ $value->risk->name }}</td>
                        <td>{{ $value->project->name }}</td>
                        <td>{{ $value->description}}</td>
                        <td>{{ $value->probability }}</td>
                        <td>{{ $value->impact }}</td>
            
                        <!-- we will also add show, edit, and delete buttons -->
                        <td  style="width:10%;">
            
                            <!-- show the nerd (uses the show method found at GET /riskprojects/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('riskProject/' . $value->risk_project_id) }}">Show this riskproject</a> -->
            
                            <!-- edit this nerd (uses the edit method found at GET /riskprojects/{id}/edit -->
                            <a class="btn btn-small btn-warning" href="{{ URL::to('riskProject/' . $value->risk_project_id. '/edit') }}">Edit</a>
                        </td >
                        <td style="width:10%;">
                            <!-- delete the nerd (uses the destroy method DESTROY /riskprojects/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                             {{ Form::open(array('url' => 'riskProject/' . $value->risk_project_id)) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}  
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="paginationButtoms">
                {{ $riskProjects->links() }}
            </div>
        </div>

    </div>
@stop