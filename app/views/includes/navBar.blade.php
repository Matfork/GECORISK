<div class="left-sidebar">
	<div class="vertical-align">
		<h2>GecoRisk</h2>
		<ul class="nav">
			<li><a href="{{ URL::to('risk') }}">{{ trans('leftSideBar.risk') }}</a></li>
			<li><a href="{{ URL::to('project') }}">{{ trans('leftSideBar.project') }}</a></li>
			<li><a href="{{ URL::to('riskProject') }}">{{ trans('leftSideBar.links') }}</a></li>
			<li><a href="">{{ trans('leftSideBar.queries') }}</a>	</li>
			<li><a href="">{{ trans('leftSideBar.reports') }}</a></li>
		</ul>
	</div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-top top_navbar">
	<div class="container-fluid">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
	     	<a class="navbar-brand" href="#">GecoRisk</a>
	    </div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
			 	<li><a href="{{ URL::to('risk') }}">{{ trans('leftSideBar.risk') }}</a></li>
				<li><a href="{{ URL::to('project') }}">{{ trans('leftSideBar.project') }}</a></li>
				<li><a href="{{ URL::to('riskProject') }}">{{ trans('leftSideBar.links') }}</a></li>
				<li><a href="">{{ trans('leftSideBar.queries') }}</a>	</li>
				<li><a href="">{{ trans('leftSideBar.reports') }}</a></li>				
			</ul>
		</div>
	</div>
</nav>