@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.riskTypes.header', array('param' => '2')) 


    <h1>Risk Types Module</h1>

     <div class="description_module">
        <h5>In the following tables you will see all the risk types registered through the timelife of the application. <h5>
        <h5> Also as a user of GecoRisk you can create, update, delete the risk types.</h5>
    </div>

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
            @foreach($riskTypes as $key => $value)
                <tr>
                    <td style="width:5%">{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td style="width:2%">
        
                        <!-- show the nerd (uses the show method found at GET /riskTypes/{id} -->
                        <!-- <a class="btn btn-small btn-success" href="{{ URL::to('riskType/' . $value->riskType_id) }}">Show this riskType</a> -->
        
                        <!-- edit this nerd (uses the edit method found at GET /riskTypes/{id}/edit -->
                        <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('riskType/' . $value->riskType_id . '/edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td style="width:2%">
                        <!-- delete the nerd (uses the destroy method DESTROY /riskTypes/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                         {{ Form::open(array('url' => 'riskType/' . $value->riskType_id )) }}
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