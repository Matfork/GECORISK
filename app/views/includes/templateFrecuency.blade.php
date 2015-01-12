@section('frecuencyRisk')
    @if($risks!=null)
        <h1> Risks Associated to {{$risks[0]->project->name}} </h1>
     
        <div class="table-responsive">
            <table id="tableProjectAssociation" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Risk Level</td>
                        <td>Probablity</td>
                        <td>Impact</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Risk Level</td>       
                    </tr>
                </thead>
                <tbody>
                @foreach($risks as $key => $value)
            
                {{--*/ $riskLevel = $value->probability  * $value->impact /*--}}
                    <tr class="{{Indicator::processData($riskLevel,'risk_level')}}">
                        <td>{{ $key+1 }}</td>
                        <td style="font-weight:bold;">{{ $value->probability  * $value->impact }}</td>
                        <td>{{ $value->probability }}</td>
                        <td>{{ $value->impact}}</td>
                        <td>{{ $value->risk->name }}</td>
                        <td>{{ $value->risk->description }}</td>
                        <td>{{ $value->risk->riskType->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif   
@stop

@section('frecuencyProject')
    @if($projects!=null)
        <h1> Projects Associated to {{$projects[0]->risk->name}} </h1>
        <div class="table-responsive">
            <table id="tableProjectAssociation" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Project Type</td>
                        <td>Begin Date</td>
                        <td>End Date</td>
                        <td>Finished</td>         
                    </tr>
                </thead>
                <tbody>
                @foreach($projects as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->project->name }}</td>
                        <td>{{ $value->project->description }}</td>
                        <td>{{ $value->project->projectType->name }}</td>
                        <td>{{ $value->project->getBeginDate() }}</td>
                        <td>{{ $value->project->getEndDate() }}</td>
                        <td>{{ $value->project->getFinished()}}</td>            
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
     @endif
@stop
