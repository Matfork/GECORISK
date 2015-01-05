@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.projectTypes.header', array('param' => '2')) 


    <h1>Project Types Module</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($projectTypes as $key => $value)
                <tr>
                    <td style="width:5%">{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td style="width:2%">
        
                        <!-- show the nerd (uses the show method found at GET /projectTypes/{id} -->
                        <!-- <a class="btn btn-small btn-success" href="{{ URL::to('projectType/' . $value->projectType_id) }}">Show this projectType</a> -->
        
                        <!-- edit this nerd (uses the edit method found at GET /projectTypes/{id}/edit -->
                        <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('projectType/' . $value->projectType_id . '/edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td style="width:2%">
                        <!-- delete the nerd (uses the destroy method DESTROY /projectTypes/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                         {{ Form::open(array('url' => 'projectType/' . $value->projectType_id )) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::button( '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type'=>'submit' , 'class' => 'btn btn-danger btn-block')) }}
                         {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>

@stop