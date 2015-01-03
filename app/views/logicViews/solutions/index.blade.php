@extends('layouts.default')

@section('content')

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
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Description</td>
                <td colspan="4">Actions</td>
            </tr>
        </thead>
        <tbody>

        @foreach($solutions as $key => $value)
            <tr>
                <td style="width:5%">{{ $value->solution_id }}</td>
                
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
                    {{ Form::open(array('url' => 'solution/' . $value->solution_id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type'=>'submit' , 'class' => 'btn btn-danger btn-block')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@stop