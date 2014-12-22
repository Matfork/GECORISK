<!-- app/views/documentTypes/index.blade.php -->

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
        <a class="navbar-brand" href="{{ URL::to('documentType') }}">documentType Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('documentType') }}">View All documentTypes</a></li>
        <li><a href="{{ URL::to('documentType/create') }}">Add a documentType</a>
    </ul>
</nav>

<h1>All the documentTypes</h1>

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
    @foreach($documentTypes as $key => $value)
        <tr>
            <td>{{ $value->documentType_id }}</td>
            <td>{{ $value->name }}</td>
        
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /documentTypes/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'documentType/' . $value->documentType_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this documentType', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the nerd (uses the show method found at GET /documentTypes/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('documentType/' . $value->documentType_id) }}">Show this documentType</a> -->

                <!-- edit this nerd (uses the edit method found at GET /documentTypes/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('documentType/' . $value->documentType_id . '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
