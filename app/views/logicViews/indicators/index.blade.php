@extends('layouts.default')

@section('content')

    <div class="container">

    @include('includes.logicViews.indicators.header', array('param' => '2')) 

    <h1>Indicators Module</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Minimun</td>
                <td>Maximum</td>
                <td>Color</td>
            </tr>
        </thead>
        <tbody>
        @foreach($indicators as $key => $value)
            <tr>
                <td style="width:5%">{{ $value->indicator_id }}</td>
                <td>{{ $value->min_indicator }}</td>
                <td>{{ $value->max_indicator }}</td>
                <td>{{ $value->color }}</td>

                <td style="width:10%">
                    <!-- edit this nerd (uses the edit method found at GET /indicators/{id}/edit -->
                    <a class="btn btn-small btn-warning btn-block" href="{{ URL::to('indicator/' . $value->indicator_id . '/edit') }}">Edit</a>
                </td>
                <td style="width:10%">
                    <!-- delete the nerd (uses the destroy method DESTROY /indicators/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                     {{ Form::open(array('url' => 'indicator/' . $value->indicator_id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this indicator', array('class' => 'btn btn-danger btn-block')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

@stop