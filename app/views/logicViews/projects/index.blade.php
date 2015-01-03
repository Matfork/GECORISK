@extends('layouts.default')

@section('content')

<div class="container">

@include('includes.logicViews.projects.header', array('param' => '2')) 

<h1>Projects Module </h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Begin Date</td>
            <td>End Date</td>
            <td>Finished</td> 
            <td colspan="2">Actions</td>           
        </tr>
    </thead>
    <tbody>
    @foreach($projects as $key => $value)
        <tr>
            <td>{{ $value->project_id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->getBeginDate() }}</td>
            <td>{{ $value->getEndDate() }}</td>
            <td>{{ $value->getFinished()}}</td>            

            <!-- we will also add show, edit, and delete buttons -->
            <td style="width:10%;">          
                <!-- show the nerd (uses the show method found at GET /projects/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('project/' . $value->project_id) }}">Show this project</a> -->

                <!-- edit this nerd (uses the edit method found at GET /projects/{id}/edit -->
                <a class="btn btn-small btn-warning" href="{{ URL::to('project/' . $value->project_id . '/edit') }}">Edit</a>
            </td>
            <td style="width:10%;">
                  
                <!-- delete the nerd (uses the destroy method DESTROY /projects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'project/' . $value->project_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
             <td style="width:10%;">
                @if(count($value->riskProjects)>0)
                    <a class="btn btn-small btn-info2" href="{{ URL::to('riskProject/project/'.$value->project_id) }}">{{count($value->riskProjects)}} Linked Risks</a>
                @else
                    <span class="btn btn-small btn-info2" >No linked Risks Yet</span>
                @endif
            </td>
             <td style="width:10%;">
                   <a class="btn btn-small btn-primary" href="{{ URL::to('riskProject/create/project/'.$value->project_id) }}">+ Link</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>

@stop