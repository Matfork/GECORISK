<!-- app/views/project/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Project Update</title>
    <link rel="stylesheet" href="{{ url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/bower_components/bootstrap-datepicker/css/datepicker3.css') }}">
    <script type="text/javascript" src="{{ url('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('project') }}">project Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('project') }}">View All project</a></li>
        <li><a href="{{ URL::to('project/create') }}">Add a project</a>
    </ul>
</nav>

<script type="text/javascript">
    $(function () {
        $('#endDatePicker,#beginDatePicker').datepicker({
             format: 'dd/mm/yyyy',
              autoclose: true,
        });
    });
</script>

<h1>Edit {{ $project->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($project, array('route' => array('project.update', $project->project_id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textArea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('begin Date', 'Begin Date') }}
        <div class='input-group date' id='endDatePicker'>
            {{ Form::text('beginDate', $project->getBeginDate(), array('class' => 'form-control')) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('endDate', 'End Date') }}
         <div class='input-group date' id='endDatePicker'>
            {{ Form::text('endDate', $project->getEndDate(), array('class' => 'form-control')) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    <div class="form-group">

        {{ Form::label('finished', 'Finished Project?') }}
        {{ Form::checkbox('chbx_finished',  Input::old('finished'), $project->finished) }}
    </div>

    {{ Form::submit('Edit the project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>