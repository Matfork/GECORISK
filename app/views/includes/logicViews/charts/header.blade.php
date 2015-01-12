@if($param==1)
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <span class="navbar-brand" >Charts Module</span>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('chart/projectRisk') }}">Project-Risk</a></li>
            <li><a href="{{ URL::to('chart/riskMatrix') }}">Risk Matrix</a></li>
        </ul>
    </nav>
@endif