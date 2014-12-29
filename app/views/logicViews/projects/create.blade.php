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

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('project') }}">Project Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('project') }}">View All projects</a></li>
                <li><a href="{{ URL::to('project/create') }}">Add a project</a>
            </ul>
        </nav>
        
        <h1>Create a project</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'project')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control')) }}
            </div>

             <div class="form-group">
                {{ Form::label('Begin Date', 'beginDate') }}
                <div class='input-group date' id='endDatePicker'>
                    {{ Form::text('beginDate', Input::old('beginDate'), array('class' => 'form-control')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('End Date', 'endDate') }}
                 <div class='input-group date' id='endDatePicker'>
                    {{ Form::text('endDate', Input::old('endDate'), array('class' => 'form-control')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

          <div class="form-group">
                {{ Form::label('finished', 'Finished Project?') }}
                {{ Form::checkbox('chbx_finished', TRUE, FALSE) }}
            </div>

            {{ Form::submit('Create the project!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@stop
