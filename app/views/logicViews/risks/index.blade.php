@extends('layouts.default')

@section('content')

    <script>
        $(function () {
            GeneralJS.initGeneralSetUp();
            RiskJS.initRiskSetUp();
        });
    </script> 

    <div class="container">

         @include('includes.logicViews.risks.header', array('param' => '2'))

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h1>Risk Module</h1>
        
        <div class="description_module">
            <h5>In the following tables you will see all the risk registered through the timelife of the application. <h5>
            <h5> Also as a user of GecoRisk you can create, update, delete and link risks according to the necessity of the projects.</h5>
        </div>
        
        <div  class="table-responsive">
            <table id="tableRisks" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">Name</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Risk Type</th>
                        <!-- <td>Projects_related</td> 
                        <td>RiskProject</td> -->
                        <th colspan="4">Actions</th>
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
                @foreach($risks as $key => $value)
                    <tr>
                        <td style="width:5%;">{{ $key+1 }}</td>
                        <td style="width:20%;">{{ $value->name }}</td>
                        <td style="width:35%;">{{ $value->description }}</td>
                        <td style="width:20%;">{{ $value->riskType->name }}</td>
                        <!--
                        <td>
                            <?php
                            /*  using normal modal for pivot
                                foreach($value->risk_projects  as $p1){
                                print '<br>' . $p1->project;
                            }*/?>
            
                            <?php
                            /*  using pivot modal
                                foreach($value->projects  as $p1){
                                print '<br>' . $p1->name . ' ' . $p1->pivot->impact;
                            }*/?>
                        </td>
                        -->
                      
                         <td style="width:10%;">
                            @if(count($value->riskProjects)>0)
                                <a class="btn btn-small btn-info2 btn-block" href="{{ URL::to('riskProject/risk/'.$value->risk_id) }}">{{count($value->riskProjects)}} Linked Projects</a>
                            @else
                                <span class="btn btn-small btn-info2 btn-block" >No linked Projects Yet</span>
                            @endif
                        </td>
                         <td style="width:10%;">
                               <a class="btn btn-small btn-primary btn-block" href="{{ URL::to('riskProject/create/risk/'.$value->risk_id) }}">+ Link</a>
                        </td>
                        <td style="width:2%;">
                            <!-- show the nerd (uses the show method found at GET /risks/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('risk/' . $value->risk_id) }}">Show this Risk</a>-->
            
                            <!-- edit this nerd (uses the edit method found at GET /risks/{id}/edit -->
                            <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('risk/' . $value->risk_id . '/edit') }}">
                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td>
                        <td style="width:2%;">
                            <!-- With this we call a general modal to delete information, but we provide to that modal what we want to delete-->
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 
                                array('data-deleteContentInfo'=>'Are you Sure you want to delete the selected Risk? There is not turning back!', 
                                      'data-toDelete'=>'risk/'.$value->risk_id,'data-toggle'=>'modal',
                                      'data-target'=>'#confirm-delete','type'=>'button' , 
                                      'class' => 'btn btn-danger btn-block')) 
                             }}   
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop