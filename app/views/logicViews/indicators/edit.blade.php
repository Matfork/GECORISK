@extends('layouts.default')

@section('content')

<div class="container">


    @include('includes.logicViews.indicators.header', array('param' => '2')) 

    <h1>Editing Indicator</h1>

     <div class="description_module">
        <h5>Update the following fields to change the current indicator information:<h5>
    </div>

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
                {{ Form::text('color', Input::old('color'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('color_value', 'Color Value') }}
                {{ Form::text('color_value', Input::old('color_value'), array('class' => 'form-control')) }}
            </div>

             <div class="form-group">
                {{ Form::label('indicator_group', 'Indicator Group') }}
                {{ Form::select('indicator_group', ['frecuency_semaphore' => 'Frecuency Semaphore'], Input::old('indicator_group'), array('class' => 'form-control')) }}
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
