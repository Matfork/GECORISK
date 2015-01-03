@extends('layouts.default')

@section('content')

<div class="container">

    @include('includes.logicViews.riskTypes.header', array('param' => '1')) 

    <h1>Creating Risk Type</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

     <div class="form_mid">

        {{ Form::open(array('url' => 'riskType')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    {{ Form::submit('Create', array('class' => 'btn btn-block btn-success')) }}
                </div>
                 <div class="col-md-6 form-group">
                    <a class="btn btn-block btn-danger" href="{{ URL::to('riskType') }}">Cancel</a>
                </div>
            </div>
        {{ Form::close() }}

    </div>
</div>

@stop
