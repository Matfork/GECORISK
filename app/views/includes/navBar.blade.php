<div class="left-sidebar">
	<div class="vertical-align">
		<h2><a class="go_gecorisk" href="{{ URL::to('/') }}">GecoRisk</a></h2>
		<ul class="nav">
			<li><a href="{{ URL::to('risk') }}">{{ trans('leftSideBar.risk') }}</a></li>
			<li><a href="{{ URL::to('project') }}">{{ trans('leftSideBar.project') }}</a></li>
			<li><a href="{{ URL::to('riskProject') }}">{{ trans('leftSideBar.links') }}</a></li>
			<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			      {{ trans('leftSideBar.queries') }}<span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu" style="background-color:#000;">
			      <li><a href="{{ URL::to('frecuency/risk') }}">{{ trans('leftSideBar.queries_risk') }}</a></li>
			   	  <li><a href="{{ URL::to('frecuency/project') }}">{{ trans('leftSideBar.queries_project') }}</a></li>
			   	  <li><a href="{{ URL::to('frecuency/document') }}">{{ trans('leftSideBar.queries_document') }}</a></li>
			    </ul>
		    </li>
	
			<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			    	{{ trans('leftSideBar.reports') }}<span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu" style="background-color:#000;">
			      <li><a href="{{ URL::to('chart/projectRisk') }}">{{ trans('leftSideBar.chart_projectRisk') }}</a></li>
			   	  <li><a href="{{ URL::to('chart/riskMatrix') }}">{{ trans('leftSideBar.chart_riskMatrix') }}</a></li>
			   	</ul>
		    </li>
			
			<li class="dropdown">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			      {{ trans('leftSideBar.admin') }} <span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu" style="background-color:#000;">
			      <li><a href="{{ URL::to('documentType') }}">{{ trans('leftSideBar.documentType') }}</a></li>
			   	  <li><a href="{{ URL::to('riskType') }}">{{ trans('leftSideBar.riskType') }}</a></li>
			      <li><a href="{{ URL::to('projectType') }}">{{ trans('leftSideBar.projectType') }}</a></li>
			      <li><a href="{{ URL::to('indicator') }}">{{ trans('leftSideBar.indicators') }}</a></li>
			    </ul>
		    </li>
			<li><a href="{{  URL::to('users/logout') }}">{{ trans('leftSideBar.log_out') }}</a></li>			
			
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
	     	<a class="navbar-brand" href="{{ URL::to('/') }}">GecoRisk</a>
	    </div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
			 	<li><a href="{{ URL::to('risk') }}">{{ trans('leftSideBar.risk') }}</a></li>
				<li><a href="{{ URL::to('project') }}">{{ trans('leftSideBar.project') }}</a></li>
				<li><a href="{{ URL::to('riskProject') }}">{{ trans('leftSideBar.links') }}</a></li>
				<li class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				      {{ trans('leftSideBar.queries') }}<span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu">
				      <li><a href="{{ URL::to('frecuency/risk') }}">{{ trans('leftSideBar.queries_risk') }}</a></li>
				   	  <li><a href="{{ URL::to('frecuency/project') }}">{{ trans('leftSideBar.queries_project') }}</a></li>
			   		  <li><a href="{{ URL::to('frecuency/document') }}">{{ trans('leftSideBar.queries_document') }}</a></li>
				    </ul>
			    </li>
				<li class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				    	{{ trans('leftSideBar.reports') }}<span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu">
				      <li><a href="{{ URL::to('chart/projectRisk') }}">{{ trans('leftSideBar.chart_projectRisk') }}</a></li>
				   	  <li><a href="{{ URL::to('chart/riskMatrix') }}">{{ trans('leftSideBar.chart_riskMatrix') }}</a></li>
				   	</ul>
			    </li>
			    <li class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				      Admin <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu" >
				      <li><a href="{{ URL::to('documentType') }}">{{ trans('leftSideBar.documentType') }}</a></li>
				   	  <li><a href="{{ URL::to('riskType') }}">{{ trans('leftSideBar.riskType') }}</a></li>
			      	  <li><a href="{{ URL::to('projectType') }}">{{ trans('leftSideBar.projectType') }}</a></li>
				      <li><a href="{{ URL::to('indicator') }}">{{ trans('leftSideBar.indicators') }}</a></li>
				    </ul>
			    </li>
			     <li><a href="{{  URL::to('users/logout') }}">{{ trans('leftSideBar.log_out') }}</a></li>			
			</ul>
		</div>
	</div>
</nav>