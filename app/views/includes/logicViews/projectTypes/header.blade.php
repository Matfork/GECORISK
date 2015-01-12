@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('projectType') }}">Project Types Module</a>
        </div>
    </nav>
@else
	 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('projectType') }}">Project Types Module</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('projectType/create') }}">Create Project Type</a></li>
          </ul>
    </nav>
@endif