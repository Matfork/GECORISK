@extends('layouts.default')

@section('content')
    <script type="text/javascript">
        $(function () {
            $('#endDatePicker,#beginDatePicker').datepicker({
                 format: 'dd/mm/yyyy',
            });
        });
    </script>

    <div class="container">

        @include('includes.logicViews.projects.header', array('param' => '1'))
        
        <h1>Create a project</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        <div class="form_mid">
        
            {{ Form::open(array('url' => 'project')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('beginDate', 'Begin Date') }}
                        <div class='input-group date' id='endDatePicker'>
                            {{ Form::text('beginDate', Input::old('beginDate'), array('class' => 'form-control')) }}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                
                    <div class="col-md-6 form-group">
                        {{ Form::label('endDate', 'End Date') }}
                         <div class='input-group date' id='endDatePicker'>
                            {{ Form::text('endDate', Input::old('endDate'), array('class' => 'form-control')) }}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::label('finished', 'Finished Project?') }}
                        {{ Form::checkbox('chbx_finished', TRUE, FALSE) }}
                    </div>

                    <div class="col-md-6 form-group">
                            {{ Form::label('projectType_id', 'Project Type') }}
                            {{ Form::select('projectType_id', ProjectType::lists('name','projectType_id'), Input::old('projectType_id'), array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control')) }}
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {{ Form::submit('Create', array('class' => 'btn btn-block btn-success')) }}
                    </div>
                     <div class="col-md-6 form-group">
                        <a class="btn btn-block btn-danger" href="{{ URL::to('project') }}">Cancel</a>
                    </div>
                </div>

            {{ Form::close() }}
        
        </div>
    </div>

@stop
