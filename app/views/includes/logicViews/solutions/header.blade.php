@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('solution/index/'.$filterRiskProject) }}">Solutions Module</a>
        </div>
    </nav>
@else
	 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('solution/index/'.$solutions[0]->risksProjects->risk_project_id) }}">Solutions Module</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('solution/create/'.$solutions[0]->risksProjects->risk_project_id) }}">Add Solution</a></li>
          </ul>
    </nav>
@endif