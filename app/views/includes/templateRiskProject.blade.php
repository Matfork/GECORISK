<!-- This is use for ajax response, we are using blades Templates-->

<!-- Another way to return data by ajas is using blade templates, like this one,
    also we can use section if we need it, so in that way we can render a selected section
    of this template. We can tale advantage of it if we want to use this template for several
    responses and selecting one of them by the method renderSections()['nameofSection'];
    Give a look in riskProjectController if you want!
-->
@section('riskProkectTemplate')
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
            <td>{{ $value->risk->name }}</td>
            <td>{{ $value->project->name }}</td>
            <td>{{ $value->description}}</td>
            <td>{{ $value->probability }}</td>
            <td>{{ $value->impact }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td  style="width:10%;">

                <!-- show the nerd (uses the show method found at GET /riskprojects/{id} -->
                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('riskProject/' . $value->risk_project_id) }}">Show this riskproject</a> -->

                <!-- edit this nerd (uses the edit method found at GET /riskprojects/{id}/edit -->
                <a class="btn btn-small btn-warning" href="{{ URL::to('riskProject/' . $value->risk_project_id. '/edit') }}">Edit</a>
            </td >
            <td style="width:10%;">
                <!-- delete the nerd (uses the destroy method DESTROY /riskprojects/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                 {{ Form::open(array('url' => 'riskProject/' . $value->risk_project_id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}  
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop