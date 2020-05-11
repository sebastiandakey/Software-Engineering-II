<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!--CDN Bootstrap and Jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<!-- <script type="text/javascript" src="../js/contact.js"></script> -->
	<!--Custom CSS-->
	<style type="text/css">
		.login-form {
			width: 340px;
	    	margin: 50px auto;
		}
	    .login-form form {
	    	margin-bottom: 15px;
	        background: #f7f7f7;
	        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	        padding: 30px;
	    }
	    .login-form h2 {
	        margin: 0 0 15px;
	    }
	    .form-control, .btn {
	        min-height: 38px;
	        border-radius: 2px;
	    }
	    .btn {        
	        font-size: 15px;
	        font-weight: bold;
	    }
	</style>

</head>
<body>
<div class="container">
	<div class="jumbotron">
    	<h1>SureDrive Insurance Portal</h1> 
	</div>
</div>

	<!--Login Form-->
	<div class="login-form">
	    <form action="loginprocess.php" method="post">
	        <h2 class="text-center">Log in</h2>       
	        <div class="form-group">
	            <input  class="form-control" placeholder="Enter Email" required="required" name="email">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Enter Password" required="required" name="upass">
	        </div>
	        <div class="form-group">
	            <button type="submit" name="ulogin" class="btn btn-primary btn-block">Log in</button>
	        </div>
	               
	    </form>
	    <p class="text-center"><a href="../sign_up/sign_up.php">Not a user? Create Account here</a></p>
	</div>
	
</body>
</html>