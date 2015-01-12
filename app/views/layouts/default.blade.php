<!doctype html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>
 
	<!-- sidebar content -->
   	@include('includes.navBar')
    <div  class="main_content">
    	 <!-- main content -->
        @yield('content')
        
    </div>
</body>
</html>
