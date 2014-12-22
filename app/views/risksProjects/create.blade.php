<!-- app/views/riskProjects/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('riskProject') }}">riskProject Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('riskProject') }}">View All riskProjects</a></li>
        <li><a href="{{ URL::to('riskProject/create') }}">Create a riskProject</a>
    </ul>
</nav>

<h1>Create a riskProject</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'riskProject')) }}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('risk_id', 'Risk') }}
        {{ Form::select('risk_id', Risk::lists('name','risk_id'), Input::old('risk_id'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_id', 'Project') }}
        {{ Form::select('project_id', Project::lists('name','project_id'), Input::old('project_id'), array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('probability', 'Probability') }}
        {{ Form::text('probability', Input::old('probability'), array('class' => 'form-control')) }}
    </div>

     <div class="form-group">
        {{ Form::label('impact', 'Impact') }}
        {{ Form::text('impact', Input::old('impact'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the riskProject!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
