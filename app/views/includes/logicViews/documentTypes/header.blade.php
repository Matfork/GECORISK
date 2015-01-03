@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('documentType') }}">Document Types Module</a>
        </div>
    </nav>
@else
	 <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('documentType') }}">Document Types Module</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('documentType/create') }}">Create Document Type</a></li>
          </ul>
    </nav>
@endif