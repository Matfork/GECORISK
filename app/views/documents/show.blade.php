<!-- app/views/documents/show.blade.php -->

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
        <li><a href="{{ URL::to('document') }}">View All documents</a></li>
      </ul>
</nav>

<h1>Showing {{ $document->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $document->nameFile }}</h2>
        <h2>{{ $value->description }}</h2>
        <h2>{{ $document->pathFile }}</h2>
        <h2>{{ $document->documentType->name }}</h2>
        <h2>{{ $document->solution }}</h2>
    </div>

</div>
</body>
</html>

