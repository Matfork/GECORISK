@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('project') }}">Project Module</a>
        </div>
    </nav>
@else
	 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('project') }}">Project Module</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('project/create') }}">Create Project</a></li>
          </ul>
    </nav>
@endif