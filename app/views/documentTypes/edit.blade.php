<!-- app/views/documentType/edit.blade.php -->
    
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
        <a class="navbar-brand" href="{{ URL::to('documentType') }}">documentType Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('documentType') }}">View All documentType</a></li>
      </ul>
</nav>

<h1>Edit {{ $documentType->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($documentType, array('method' => 'put', 'route' => array('documentType.update', $documentType->documentType_id )) ) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit this documentType!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
