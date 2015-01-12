@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.risksProjects.header', array('param' => '1'))

        <h1>Creating Link</h1>

        <div class="description_module">
            <h5>Complete the following information to create a new link between a project and a risk:<h5>
        </div>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
        
            {{ Form::open(array('url' => 'riskProject')) }}

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('project_id', 'Project') }}
                        @if(isset($filterProject))
                            {{ Form::select('project_id', Project::lists('name','project_id'), $filterProject, array('class' => 'form-control','disabled')) }}
                            {{ Form::hidden('project_id', $filterProject, array('class' => 'form-control')) }}
                            {{ Form::hidden('type', 'project', array('class' => 'form-control')) }}
                        @else
                            {{ Form::select('project_id', Project::lists('name','project_id'), 0, array('class' => 'form-control')) }}
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        {{ Form::label('risk_id', 'Risk') }}
                        @if(isset($filterRisk))
                            {{ Form::select('risk_id', Risk::lists('name','risk_id'), $filterRisk, array('class' => 'form-control','disabled')) }}
                            {{ Form::hidden('risk_id', $filterRisk, array('class' => 'form-control')) }}
                            {{ Form::hidden('type', 'risk', array('class' => 'form-control')) }}
                        @else
                            {{ Form::select('risk_id', Risk::lists('name','risk_id'), 0, array('class' => 'form-control')) }}
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('probability', 'Probability') }}
                        {{ Form::select('probability', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], Input::old('probability'), array('class' => 'form-control')) }}
                    </div>

                     <div class="col-md-6 form-group">
                        {{ Form::label('impact', 'Impact') }}
                        {{ Form::select('impact', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'], Input::old('impact'), array('class' => 'form-control')) }}
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
                        <a class="btn btn-block btn-danger" href="{{ URL::to('riskProject') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}

        </div>
    </div>
@stop
