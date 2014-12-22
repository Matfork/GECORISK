<!-- app/views/riskProjects/show.blade.php -->

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
      </ul>
</nav>

<h1>Showing {{ $riskProject->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $riskProject->risk_project_id }}</h2>
        <p>
            <strong>Description:</strong> {{ $riskProject->description }}<br>
            <strong>Risk:</strong> {{ $riskProject->risk->risk_id  }}<br>
            <strong>Project:</strong> {{ $riskProject->project_id }}<br>
            <strong>Probability:</strong> {{ $riskProject->probability }}<br>
            <strong>Impact:</strong> {{ $riskProject->impact }}<br>
        </p>
    </div>

</div>
</body>
</html>

