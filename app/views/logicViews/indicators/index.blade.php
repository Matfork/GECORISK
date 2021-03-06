@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.indicators.header', array('param' => '2')) 

    <h1>Indicators Module</h1>

    <div class="description_module">
        <h5>In the following tables you will see all the indicators registered through the timelife of the application. <h5>
        <h5> Also as a user of GecoRisk you can create, update, delete the indicators.</h5>
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
                    <td>Minimun</td>
                    <td>Maximum</td>
                    <td>Color</td>
                    <td>Color Value</td>
                    <td>Indicator Group</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($indicators as $key => $value)
                <tr>
                    <td style="width:5%">{{ $key+1}}</td>
                    <td>{{ $value->min_indicator }}</td>
                    <td>{{ $value->max_indicator }}</td>
                    <td>{{ $value->color }}</td>
                    <td>{{ $value->color_value }}</td>
                    <td>{{ $value->indicator_group }}</td>
                    <td style="width:2%">
                        <!-- edit this nerd (uses the edit method found at GET /indicators/{id}/edit -->
                        <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('indicator/' . $value->indicator_id . '/edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    </td>
                    <td style="width:2%">
                        <!-- delete the nerd (uses the destroy method DESTROY /indicators/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                         {{ Form::open(array('url' => 'indicator/' . $value->indicator_id)) }}
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