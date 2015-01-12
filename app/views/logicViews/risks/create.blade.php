@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.risks.header', array('param' => '1'))

        <h1>Creating a new risk</h1>

        <div class="description_module">
            <h5>Complete the following information to create a new risk:<h5>
        </div>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
    
        <div class="form_mid">
        
            {{ Form::open(array('url' => 'risk')) }}

                <div class="row">
                    <div class="col-md-6 form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                    </div>
               
                    <div class="col-md-6 form-group">
                        {{ Form::label('riskType_id', 'Risk Type') }}
                        {{ Form::select('riskType_id', RiskType::lists('name','riskType_id'), Input::old('riskType_id'), array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control','rows' => 5)) }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Create', array('class' => 'btn btn-block btn-success')) }}
                    </div>
                     <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('risk') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop