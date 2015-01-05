@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <span class="navbar-brand" >Queries Module</span>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('frecuency/project') }}">Project Frecuency</a></li>
            <li><a href="{{ URL::to('frecuency/risk') }}">Risk Frecuency</a></li>
            <li><a href="{{ URL::to('frecuency/document') }}">Document Main</a></li>
        </ul>
    </nav>
@endif