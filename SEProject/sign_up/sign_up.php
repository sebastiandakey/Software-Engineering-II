<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
	<!--Signup Form-->
	<div class="login-form">
	    <form action="sign_upprocess.php" method="post">
	        <h2 class="text-center">Sign Up</h2>       
	        <div class="form-group">
	            <input type="text" class="form-control" placeholder="First Name" required="required" name="fname">
	        </div>
	        <div class="form-group">
	            <input type="text" class="form-control" placeholder="Last Name" required="required" name="lname">
	        </div>
            <div class="form-group">
			<label for="policyType">Choose a Policy Type:</label>
				<select id="policyType" name="policyType">
					<option value="Comprehensive Insurance">Comprehensive Insurance</option>
					<option value="Third Party Insurance">Third Party Insurance</option>
					<option value="Third Party Fire and Theft">Third Party Fire and Theft</option>
				</select>
			</div>
			<div class="form-group">
	            <input type="number" class="form-control" placeholder="Phone Number" required="required" name="pnum">
			</div>
			<div class="form-group">
	            <input type="email" class="form-control" placeholder="Enter Email" required="required" name="email">
			</div>
			<div class="form-group">
	            <input type="password" class="form-control" placeholder="Password" required="required" name="upass">
			</div>
			<div class="form-group">
	            <input type="password" class="form-control" placeholder="Confirm Password" required="required" name="upass_c">
			</div>
			
	        <div class="form-group">
	            <button type="submit" name="usign_up" class="btn btn-primary btn-block">Sign Up</button>
	        </div>
	               
	    </form>
	    <p class="text-center"><a href="../login/login.php">Already a user ? Go to Login Page</a></p>
	</div>
	
</body>
</html>