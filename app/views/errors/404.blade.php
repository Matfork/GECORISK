<html>
	<head>
		<link rel="stylesheet" href="{{ url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/css/build/styles.min.css') }}">

		<style>
			.error_main{
				width: 100%;
				top: 50%;
				position: absolute;
				height: 350px;
				transform: translateY(-50%);
				background-color: #fff;
				color: #000;
				text-align: center;
			}

			p{
				font-size: 24px;
			}

			h1{
				font-size: 60px;
				margin-bottom: 30px;
			}

			.error_body{
				background-color: #000;
			}
		</style>

	</head>
	<body class="error_body">
		<div class="error_main">
		 	<h1>GECORISK</h1> 
			<p>Whoops! The page you are looking for: </p> 
			<p>{{$url}} </p>
			<p> wasn't found on the server. =(</p>

			<a class="btn btn-small btn-info2" style="margin-top:20px;" href="{{ URL::to('/') }}"> Back to Main</a>
		</div>
	</body>
</html>	