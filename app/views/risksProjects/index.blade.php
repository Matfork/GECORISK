<!-- app/views/riskprojects/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="{{ url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('riskProject') }}">riskproject Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('riskProject') }}">View All riskprojects</a></li>
        <li><a href="{{ URL::to('riskProject/create') }}">Add a riskproject</a>
    </ul>
</nav>

<h1>All the riskprojects</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Description</td>
            <td>Risk</td>
            <td>Project</td>
            <td>Probabilty</td>
            <td>Impact</td>
        </tr>
    </thead>
    <tbody>
    @foreach($riskProjects as $key => $value)
        <tr>
            <td>{{ $value->risk_project_id}}</td>
            <td>{{ $value->description}}</td>
            <td>{{ $value->risk->risk_id }}</td>
            <td>{{ $value->project->project_id }}</td>
            <td>{{ $value->probability }}</td>
            <td>{{ $value->impact }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- delete the nerd (uses the destroy method DESTROY /riskprojects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'riskProject/' . $value->risk_project_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this riskproject', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /riskprojects/{id} -->
                 <a class="btn btn-small btn-success" href="{{ URL::to('riskProject/' . $value->risk_project_id) }}">Show this riskproject</a>

                <!-- edit this nerd (uses the edit method found at GET /riskprojects/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('riskProject/' . $value->risk_project_id. '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
