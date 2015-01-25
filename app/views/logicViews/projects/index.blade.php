@extends('layouts.default')

@section('content')

    <script>
        $(function () {
            GeneralJS.initGeneralSetUp();
            ProjectJS.initProjectSetUp();
        });
    </script>

    <div class="container">

        @include('includes.logicViews.projects.header', array('param' => '2')) 

          <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <h1>Projects Module </h1>

        <div class="description_module">
            <h5>In the following tables you will see all the projects registered through the timelife of the application. <h5>
            <h5>Also as a user of GecoRisk you can create, update, delete and link projects with already registered risk.</h5>
        </div>

        <div class="table-responsive">
            <table id="tableProjects" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">Name</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Project Type</th>
                        <th rowspan="2">Begin Date</th>
                        <th rowspan="2">End Date</th>
                        <th rowspan="2">Finished</th> 
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
                                <a class="btn btn-small btn-info2 btn-block" href="{{ URL::to('riskProject/project/'.$value->project_id) }}">{{count($value->riskProjects)}} Linked Risks</a>
                            @else
                                <span class="btn btn-small btn-info2 btn-block" >No linked Risks Yet</span>
                            @endif
                        </td>
                         <td style="width:10%;">
                               <a class="btn btn-small btn-primary btn-block" href="{{ URL::to('riskProject/create/project/'.$value->project_id) }}">+ Link</a>
                        </td>
                         <!-- we will also add show, edit, and delete buttons -->
                        <td style="width:2%;">          
                            <!-- show the nerd (uses the show method found at GET /projects/{id} -->
                            <!-- <a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->project_id) }}">Show this project</a> -->
            
                            <!-- edit this nerd (uses the edit method found at GET /projects/{id}/edit -->
                            <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('project/' . $value->project_id . '/edit') }}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        </td>
                        <td style="width:2%;">
                              
                             <!-- With this we call a general modal to delete information, but we provide to that modal what we want to delete-->
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 
                                array('data-deleteContentInfo'=>'Are you Sure you want to delete the selected Project? There is not turning back!',
                                      'data-toDelete'=>'project/' . $value->project_id,'data-toggle'=>'modal',
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