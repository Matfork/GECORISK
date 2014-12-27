<!-- app/views/solutions/index.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('solution') }}">solution Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('solution') }}">View All solutions</a></li>
        <li><a href="{{ URL::to('solution/create') }}">Add a solution</a>
    </ul>
</nav>

<h1>All the solutions</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
    @foreach($solutions as $key => $value)
        <tr>
            <td>{{ $value->solution_id }}</td>
            <td>{{ $value->description }}</td>
            
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /solutions/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'solution/' . $value->solution_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this solution', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /solutions/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('solution/' . $value->solution_id) }}">Show this solution</a> -->

                <!-- edit this nerd (uses the edit method found at GET /solutions/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('solution/' . $value->solution_id . '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>