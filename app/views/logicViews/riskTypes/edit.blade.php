<!-- app/views/riskType/edit.blade.php -->
    
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
        <a class="navbar-brand" href="{{ URL::to('riskType') }}">riskType Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('riskType') }}">View All riskType</a></li>
      </ul>
</nav>

<h1>Edit {{ $riskType->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($riskType, array('method' => 'put', 'route' => array('riskType.update', $riskType->riskType_id )) ) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit this riskType!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
