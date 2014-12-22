<!-- app/views/documentTypes/show.blade.php -->

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
        <li><a href="{{ URL::to('documentType') }}">View All documentTypes</a></li>
      </ul>
</nav>

<h1>Showing {{ $documentType->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $documentType->name }}</h2>
        <p>
            <strong>NAme:</strong> {{ $documentType->name }}<br>
        </p>
    </div>

</div>
</body>
</html>

