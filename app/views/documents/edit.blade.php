<!-- app/views/document/edit.blade.php -->
    
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
        <a class="navbar-brand" href="{{ URL::to('document') }}">document Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('document') }}">View All document</a></li>
      </ul>
</nav>

<h1>Edit {{ $document->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($document, array('method' => 'put', 'route' => array('document.update', $document->document_id )) ) }}

   
    <div class="form-group">
        {{ Form::label('solution_id', 'Solution') }}
        {{ Form::text('solution_id', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('pathFile', 'Path File') }}
        {{ Form::text('pathFile', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('nameFile', 'Name File') }}
        {{ Form::text('nameFile', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('documentType_id', 'Document Type') }}
        {{ Form::select('documentType_id', DocumentType::lists('name','documentType_id'), Input::old('documentType_id'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit this document!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
