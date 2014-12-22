<!-- app/views/indicator/edit.blade.php -->
    
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
        <a class="navbar-brand" href="{{ URL::to('indicator') }}">indicator Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('indicator') }}">View All indicator</a></li>
      </ul>
</nav>

<h1>Edit {{ $indicator->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($indicator, array('method' => 'put', 'route' => array('indicator.update', $indicator->indicator_id )) ) }}

    <div class="form-group">
        {{ Form::label('min_indicator', 'Minimum Indicator') }}
        {{ Form::text('min_indicator', Input::old('min_indicator'), array('class' => 'form-control')) }}
    </div>

    
    <div class="form-group">
        {{ Form::label('max_indicator', 'Maximum Indicator') }}
        {{ Form::text('max_indicator', Input::old('max_indicator'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('color', 'Color') }}
        {{ Form::select('color', ['Red' => 'Red','Yellow' => 'Yellow', 'Green' => 'Green']) }}
    </div>

    {{ Form::submit('Update the indicator!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
