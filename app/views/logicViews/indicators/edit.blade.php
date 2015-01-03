@extends('layouts.default')

@section('content')

<div class="container">


    @include('includes.logicViews.indicators.header', array('param' => '2')) 

    <h1>Editing Indicator</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    <div class="form_mid">
        
        {{ Form::model($indicator, array('method' => 'put', 'route' => array('indicator.update', $indicator->indicator_id )) ) }}

            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::label('min_indicator', 'Minimum Indicator') }}
                    {{ Form::text('min_indicator', Input::old('min_indicator'), array('class' => 'form-control')) }}
                </div>

                <div class="col-md-6 form-group">
                    {{ Form::label('max_indicator', 'Maximum Indicator') }}
                    {{ Form::text('max_indicator', Input::old('max_indicator'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('color', 'Color') }}
                {{ Form::select('color', ['Red' => 'Red','Yellow' => 'Yellow', 'Green' => 'Green'],0, array('class' => 'form-control')) }}
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::submit('Edit', array('class' => 'btn btn-block btn-success')) }}
                </div>
                 <div class="col-md-6 form-group">
                    <a class="btn btn-block btn-danger" href="{{ URL::to('indicator') }}">Cancel</a>
                </div>
            </div>

        {{ Form::close() }}

    </div>
</div>

@stop
