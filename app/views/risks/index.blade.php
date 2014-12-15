<!-- app/views/risks/index.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('risk') }}">Risk Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('risk') }}">View All risks</a></li>
        <li><a href="{{ URL::to('risk/create') }}">Add a Risk</a>
    </ul>
</nav>

<h1>All the risks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Risk Type</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($risks as $key => $value)
        <tr>
            <td>{{ $value->risk_id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->riskType->name }}</td>
            
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /risks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'risk/' . $value->risk_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Risk', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /risks/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('risk/' . $value->risk_id) }}">Show this Risk</a>

                <!-- edit this nerd (uses the edit method found at GET /risks/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('risk/' . $value->risk_id . '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
