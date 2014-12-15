<!-- app/views/risk/edit.blade.php -->
    
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
        <a class="navbar-brand" href="{{ URL::to('risk') }}">Risk Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('risk') }}">View All risk</a></li>
        <li><a href="{{ URL::to('risk/create') }}">Create a Risk</a>
    </ul>
</nav>

<h1>Edit {{ $risk->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($risk, array('method' => 'put', 'route' => array('risk.update', $risk->risk_id )) ) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('risk_level', 'Desription Level') }}
        {{ Form::select('riskType_id', RiskType::lists('name','riskType_id'), Input::old('riskType_id'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Risk!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
