@extends('layouts.default')

@section('content')
    <script type="text/javascript" src="{{ url('assets/bower_components/highcharts/highcharts.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/bower_components/highcharts/modules/drilldown.js') }}"></script>
    
    <script>
        $(function () {

    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Basic drilldown'
        },
        xAxis: {
            type: 'category'
        },

        legend: {
            enabled: false
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        series: [{
            name: 'Things',
            colorByPoint: true,
            data: [{
                name: 'Animals',
                y: 5,
                drilldown: 'animals'
            }, {
                name: 'Fruits',
                y: 2,
                drilldown: 'fruits'
            }, {
                name: 'Cars',
                y: 4,
                drilldown: 'cars'
            }]
        }],
        drilldown: {
            series: [{
                id: 'animals',
                data: [
                    ['Cats', 4],
                    ['Dogs', 2],
                    ['Cows', 1],
                    ['Sheep', 2],
                    ['Pigs', 1]
                ]
            }, {
                id: 'fruits',
                data: [
                    ['Apples', 4],
                    ['Oranges', 2]
                ]
            }, {
                id: 'cars',
                data: [
                    ['Toyota', 4],
                    ['Opel', 2],
                    ['Volkswagen', 2]
                ]
            }]
        }
    });
});

    </script> 

    <div class="container">

        @include('includes.logicViews.charts.header', array('param' => '1')) 

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        
       <pre id="tsv" style="display:none">Browser Version   Total Market Share
Microsoft Internet Explorer 8.0 26.61%
Microsoft Internet Explorer 9.0 16.96%
Chrome 18.0 8.01%
Chrome 19.0 7.73%
Firefox 12  6.72%
Microsoft Internet Explorer 6.0 6.40%
Firefox 11  4.72%
Microsoft Internet Explorer 7.0 3.55%
Safari 5.1  3.53%
Firefox 13  2.16%
Firefox 3.6 1.87%
Opera 11.x  1.30%
Chrome 17.0 1.13%
Firefox 10  0.90%
Safari 5.0  0.85%
Firefox 9.0 0.65%
Firefox 8.0 0.55%
Firefox 4.0 0.50%
Chrome 16.0 0.45%
Firefox 3.0 0.36%
Firefox 3.5 0.36%
Firefox 6.0 0.32%
Firefox 5.0 0.31%
Firefox 7.0 0.29%
Proprietary or Undetectable 0.29%
Chrome 18.0 - Maxthon Edition   0.26%
Chrome 14.0 0.25%
Chrome 20.0 0.24%
Chrome 15.0 0.18%
Chrome 12.0 0.16%
Opera 12.x  0.15%
Safari 4.0  0.14%
Chrome 13.0 0.13%
Safari 4.1  0.12%
Chrome 11.0 0.10%
Firefox 14  0.10%
Firefox 2.0 0.09%
Chrome 10.0 0.09%
Opera 10.x  0.09%
Microsoft Internet Explorer 8.0 - Tencent Traveler Edition  0.09%</pre>
       
        <div style="height:75px;">
            <div style="float:left"> <h1>Projects-Risk Chart </h1></div>
            <div class="exportNav">
            </div>
        </div>

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