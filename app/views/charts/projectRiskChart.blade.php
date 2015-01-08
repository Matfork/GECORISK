@extends('layouts.default')

@section('content')
    <script type="text/javascript" src="{{ url('assets/bower_components/highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/bower_components/highcharts/modules/drilldown.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/bower_components/highcharts/themes/dark-unica.js') }}"></script>
    
    <script>
        $(function () {

            var drillDown_list = new Array();
            var main_list = new Array();

            @if(isset($list_one)) 
                main_list = {{$list_one}};
            @endif

            @if(isset($list_drilldown)) 
                drillDown_list = {{$list_drilldown}};
            @endif

            ChartJS.initialChartProjectRiskSetUp(main_list,drillDown_list);
            
        });
    </script> 

    <div class="container">

        @include('includes.logicViews.charts.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
  
        <div style="height:65px;">
            <div style="float:left"><h1>Projects-Risks Chart </h1></div>
            <div class="inputFilers">
                <div class="col-md-4 form-group"  style="float:right;">
                    {{ Form::label('filter_projectType', 'Filter by Project Types') }}
                    {{ Form::select('filter_projectType', array('0' => '----- All Project Types -----') + ProjectType::lists('name','projectType_id'), isset($filterProject_id)?$filterProject_id:0 , array('class' => 'form-control filters')) }}
                </div>           
            </div>
        </div>

        <div class="description_text">
            <p>
                In the next chart you will be able to view the number of risks per each project. Additionally, you can filter the project by its project type in order to show less column bars.
            </p>
            <p>
                Also, if you click in one project bar, the chart will display the all the risks name and risk level associated with the selected project.
            </p>
        </div>


        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <div class="table_associated"></div>
    </div>

@stop