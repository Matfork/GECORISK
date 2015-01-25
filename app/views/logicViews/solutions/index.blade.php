@extends('layouts.default')

@section('content')
    <script>
        $(function () {
            GeneralJS.initGeneralSetUp();
            SolutionJS.initSolutionSetUp();
        });
    </script>

    <div class="container">

        @include('includes.logicViews.solutions.header', array('param' => '2'))
        
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div style="height:60px;">
            <div style="float:left"><h1>Solution Module</h1></div>
            <div style="float:right; margin-top:20px;"><a href="{{ URL::to('riskProject') }}" class="btn btn-primary">Return to RiskProjects</a></div>
        </div>

        <h4>Project: {{$solutions[0]->risksProjects->project->name}}</h4>
        <h4>Risk: {{$solutions[0]->risksProjects->risk->name}}</h4>

        <div class="description_module">
            <h5>In the following table you will see all the solutions registered through the timelife of the application related to the link described below. <h5>
            <h5> Also as a user of GecoRisk you can create, update, delete the solutions, as well as adding documents to an specific solution.</h5>
        </div>

        <div class="table-responsive">
            <table id="tableSolutions"  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td rowspan="2">#</td>
                        <td rowspan="2">Description</td>
                        <td colspan="4">Actions</td>
                    </tr>
                     <!-- trick for datatable colspan issue -->
                    <tr style="display:none;">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                     </tr>
                </thead>
                <tbody>
            
                @foreach($solutions as $key => $value)
                    <tr>
                        <td style="width:5%">{{ $key+1 }}</td>
                        
                        <td>{{ $value->description }}</td> 
                        <td style="width:10%;">
                            @if(count($value->documents)>0)
                                <a class="btn btn-small btn-info2 btn-block" href="{{ URL::to('document/index/'.$value->solution_id) }}">{{count($value->documents)}} documents</a>
                            @else
                                <span class="btn btn-small btn-info2 btn-block" >No Documents Yet</span>
                            @endif
                        </td>
                         <td style="width:10%;">
                            <a class="btn btn-small btn-primary btn-block" href="{{ URL::to('document/create/'.$value->solution_id) }}">+ Document</a>
                        </td>
                        <td style="width:2%">
                            <!-- show the nerd (uses the show method found at GET /solutions/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('solution/' . $value->solution_id) }}">Show this solution</a> -->
            
                            <!-- edit this nerd (uses the edit method found at GET /solutions/{id}/edit -->
                            <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('solution/' . $value->solution_id . '/edit') }}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td>
                        <td style="width:2%">

                            <!-- With this we call a general modal to delete information, but we provide to that modal what we want to delete-->
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 
                                array('data-deleteContentInfo'=>'Are you Sure you want to delete the selected Solution? There is not turning back!',
                                      'data-toDelete'=>'solution/' . $value->solution_id,'data-toggle'=>'modal',
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