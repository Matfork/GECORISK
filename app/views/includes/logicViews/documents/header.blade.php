@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('document/index/'.$filterSolution) }}">Document Module</a>
        </div>
    </nav>
@else
	 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('document/index/'.$documents[0]->solution->solution_id) }}">Document Module</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('document/create/'.$documents[0]->solution->solution_id) }}">Add Document</a></li>
          </ul>
    </nav>
@endif