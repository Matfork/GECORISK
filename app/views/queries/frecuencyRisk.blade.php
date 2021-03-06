@extends('layouts.default')

@section('content')

    <script>
        $(function(){
            FrecuencyJS.initialRiskSetUp();
        });
    </script>   
    
    <div class="container">

        @include('includes.logicViews.frecuency.header', array('param' => '1'))

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
   
        <div style="height:65px;">
            <div style="float:left"><h1>Risk Frecuency</h1></div>
            <div class="inputFilers">
                <div class="col-md-4 form-group"  style="float:right;">
                    {{ Form::label('filter_projectType', 'Filter by Project Types') }}
                    {{ Form::select('filter_projectType', array('0' => '----- All Project Types -----') + ProjectType::lists('name','projectType_id'), isset($filterProject_id)?$filterProject_id:0 , array('class' => 'form-control filters')) }}
                </div>           
            </div>
        </div>

        <div class="description_module">
            <h5>Here you can see the frecuency of times that an specific risk has been linked to different projects, the percentage shown in the table is calculated by the number of total projects in which the risk has appeared.
                The more frecuency the more times the risk has appeared in projects</h5>
            <h5>With this information you can take on account which risk you need to track in order to control the probability and impact  in the project you are working in right now.<h5>
            <h5>Also if you clink in the purple button next to the risk, you can view the projects in which the risks has been linked.</h5>
        </div>
        
        <h4>Total Projects: {{$total_projects}} </h4>

        <div class="table_frencuency table-responsive">
            <table id="tableRiskFrecuency" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Frecuency</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Risk Type</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($risks as $key => $value)
                    <tr class="{{Indicator::processData($value->getFrecuency(),'frecuency_semaphore')}}">
                        <td style="width:5%;">{{ $key+1 }}</td>
                        <td style="width:5%;font-weight:bold;">{{ $value->getFrecuency()."%" }}</td>
                        <td style="width:20%;">{{ $value->name }}</td>
                        <td style="width:35%;">{{ $value->description }}</td>
                        <td style="width:20%;">{{ $value->riskType->name }}</td>
                      
                         <td style="width:10%;">
                            @if($value->getTotalProjectsAssociated()>0)
                                <button class="btn btn-small btn-info2 btn-block btnProjectAssociated" data-type="risk" data-id="{{ $value->risk_id }}">{{$value->getTotalProjectsAssociated()}} Projects Associated</button>
                            @else
                                <span class="btn btn-small btn-info2 btn-block" >No linked Projects Yet</span>
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