@extends('layouts.default')

@section('content')

    <div class="container">

        @include('includes.logicViews.risksProjects.header', array('param' => '2'))

        <h1>Editing link</h1>

        <div class="description_module">
            <h5>Update the following link information, gray boxes can't be modified.<h5>
        </div>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">

            {{ Form::model($riskProject, array('method' => 'put', 'route' => array('riskProject.update', $riskProject->risk_project_id )) ) }}
            
                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('project_id', 'Project') }}
                        {{ Form::select('project_id', Project::lists('name','project_id'), Input::old('project_id'), array('class' => 'form-control','disabled')) }}
                        {{ Form::hidden('project_id', Input::old('project_id'), array('class' => 'form-control')) }}                            
                    </div>
                    
                    <div class="col-md-6 form-group">
                        {{ Form::label('risk_id', 'Risk') }}
                        {{ Form::select('risk_id', Risk::lists('name','risk_id'), Input::old('risk_id'), array('class' => 'form-control','disabled')) }}
                        {{ Form::hidden('risk_id', Input::old('risk_id'), array('class' => 'form-control')) }}                            
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
                        {{ Form::submit('Edit', array('class' => 'btn btn-success btn-block')) }}
                     </div>
                     <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('riskProject') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}
        </div>

    </div>

@stop