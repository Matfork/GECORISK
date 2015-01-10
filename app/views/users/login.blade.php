<!doctype html>
<html lang="en">
	<head>
		@include('includes.head')
	       

    	<style> 
	        body {
	        	 background-color: #EEE;
	        }
	        .mainContent { 
	            background-color: #FFF; 
	            margin: auto;
	            width: 400px; 
	            padding: 20px;  
	            box-shadow: 0 0 20px #AAA;
	            position: relative;
	            top:50%;
	            transform:translateY(-70%);
	            text-align: center;
	        } 

	        h1{
	        	margin-bottom: 30px;
	        }

	        .form-control{
	        	margin-bottom: 30px;
	        }
        </style> 
    </head> 
    <body>  
        <div class="mainContent"> 
            <h1>Login Gecorisk</h1> 
            {{ Confide::makeLoginForm()->render(); }} 
        </div> 
    </body> 
</html>