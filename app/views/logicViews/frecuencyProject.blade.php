@extends('layouts.default')

@section('content')

    <script>
        $(function(){
            FrecuencyJS.initialProjectSetUp();
        });
    </script> 

    <div class="container">

        @include('includes.logicViews.frecuency.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        
        <h1>Projects Frecuency </h1>

        <div class="table_frencuency table-responsive">
           <table id="tableProjectFrecuency" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Project Type</td>
                        <td>Begin Date</td>
                        <td>End Date</td>
                        <td>Finished</td> 
                        <td colspan="1">Actions</td>           
                    </tr>
                </thead>
                <tbody>
                @foreach($projects as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->projectType->name }}</td>
                        <td>{{ $value->getBeginDate() }}</td>
                        <td>{{ $value->getEndDate() }}</td>
                        <td>{{ $value->getFinished()}}</td>            

                        <td style="width:10%;">
                            @if(count($value->riskProjects)>0)
                                <button class="btn btn-small btn-info2 btn-block btnProjectAssociated" data-type="project" data-id="{{ $value->project_id }}">{{count($value->riskProjects)}} Risks Associated</button>
                            @else
                                <span class="btn btn-small btn-info2 btn-block" >No linked Risks Yet</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table_associated"></div>
    </div>

@stop