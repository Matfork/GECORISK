@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.solutions.header', array('param' => '1'))
            
        <h1>Adding solution</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
           
            {{ Form::open(array('url' => 'solution')) }}
                
                {{ Form::hidden('risk_project_id', $filterRiskProject, array('class' => 'form-control')) }}

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control', 'rows' => '5')) }}
                </div>
      
                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Add', array('class' => 'btn btn-success btn-block')) }}
                   </div>
                    <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('solution/index/'.$filterRiskProject) }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>

@stop