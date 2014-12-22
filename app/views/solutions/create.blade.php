<!-- app/views/solutions/create.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('solution') }}">solution Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('solution') }}">View All solutions</a></li>
        <li><a href="{{ URL::to('solution/create') }}">Create a solution</a>
    </ul>
</nav>

<h1>Create a solution</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'solution')) }}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('descriṕtion'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the solution!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
