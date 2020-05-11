<?php
    //connect to the core file for general configuration
    require("../settings/core.php");

    //check for login
    check_login();

    //include the controller
    require('../controllers/accountcontroller.php');
    //define avaribale for contact listing
	$user_account;
    $a=$_SESSION["email"];
    //var_dump($_SESSION); 
    //echo("this");
    
    //var_dump($_SESSION["user_id"]);
    //dsiplay standard list of customer
    global $user_account; 
    //run the function to return all contact
    $user_account = view_statement_fxn($a);
    
    
    


    
    //var_dump($user_account);
    if($user_account==null){
        //echo("everything is null");
        $user_account[0]["amount"]=0;
        $user_account[0]["fname"]='';
        $user_account[0]["lname"]='';
        $user_account[0]["acctype"]='';
        $user_account[0]["anum"]='';

        $message1 = "Welcome to the BankApp, fill details now please.";
        echo "<script type='text/javascript'>alert('$message1');</script>";
        $message = "Please fill the profile section";
        echo "<script type='text/javascript'>alert('$message');</script>";

        
    }
    // $uid=$user_account[0]["aid"];
    // $_SESSION["userid"]=$uid;
    // print_r($_SESSION["userid"]);
    //print_r($user_account);
    

?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <title>Main Banking Page</title>
  </head>
  <body >
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">View Account Statement</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Account Profile</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Make Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-claims-tab" data-toggle="pill" href="#pills-claims" role="tab" aria-controls="pills-claims" aria-selected="false">Make Claims</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
            <div class="card text-center">
                <div class="card-header">
                Account Statement
            </div>
            <div class="card-body">
                <h5 class="card-title">Premium Balance is : <span name="acctbal"><strong>GHS<?php echo($user_account[0]["amount"]);?></strong></span></h5>
                <p class="card-text">InsuranceID : <span name="actnum"><strong><?php echo($user_account[0]["anum"]);?></strong> </span></p>
                <p class="card-text">First Name : <span name="fname"><strong><?php echo($user_account[0]["fname"]);?></strong> </span></p>
                <p class="card-text">Last Name : <span name="lname"><strong><?php echo($user_account[0]["lname"]);?> </strong></span></p>
                <p class="card-text">Account Type: <span name="acttype"><strong><?php echo($user_account[0]["acctype"]);?> </strong></span></p>
                <p class="card-text">Phone Number: <span name="phone"><strong><?php echo($user_account[0]["phone"]);?> </strong></span></p>
                <p class="card-text">Email : <span name="acttype"><strong><?php echo($user_account[0]["email"]);?> </strong></span></p>


                <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            </div>
                <div class="card-footer text-muted">
                    Powered by: sureDrive Inc
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
         <div class="card text-center">
            <div class="card-header">
                Transaction Section
            </div>
            <div class="card-body">
            <form action="handleForm.php" method="post">
                <div class="form-group">
                    <label >First Name <input name="update_fname" type="text" class="form-control" placeholder="First name" value="<?php echo($user_account[0]["fname"]);?>" required></label>    
                </div>
                <div class="form-group">
                    <label >Last Name <input name="update_lname" type="text" class="form-control" placeholder="Last name" value="<?php echo($user_account[0]["lname"]);?>" required></label>    
                </div>
                <div class="form-group">
                    <label >Email <input name="update_email" type="email" class="form-control" placeholder="Email" value="<?php echo($user_account[0]["email"]);?>" required></label>    
                </div>
                <div class="form-group">
                <label for="policyType">Choose a Policy Type:</label>
				<select id="policyType" name="policyType">
					<option value="Comprehensive Insurance">Comprehensive Insurance</option>
					<option value="Third Party Insurance">Third Party Insurance</option>
					<option value="Third Party Fire and Theft">Third Party Fire and Theft</option>
				</select>                </div>
                <div class="form-group">
                    <label >Phone Number <input  name="update_pnum" type="number" class="form-control" placeholder="Phone number" value="<?php echo($user_account[0]["pphone"]);?>" required></label>    
                </div>
                <button type="submit" name="submitForm" class="btn btn-primary">Save Data</button>
            </form>
            </div>
            <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            <div class="card-footer text-muted">
                Powered by: sureDrive Inc
            </div>
    
            </div> -->
    
        </div>
        
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="card text-center">
            <div class="card-header">
                Transaction Section
            </div>
            <div class="card-body">
            <h5 class="card-title">Total Premium Paid : <span name="acctbal"><strong>GHS<?php echo($user_account[0]["amount"]);?> </strong></span></h5>
            <div class="row no-gutters">
                <div class="col-md-12 no-gutters">
                    <div class="left d-flex justify-content-center align-content-center">
                    <form action="transactionForm.php" method="post">
                    <div class="form-group">
                        <label >Insurance ID: <input  name="acct_rece" type="number" class="form-control" placeholder="" required></label>    
                    </div>
                    <div class="form-group">
                        <label >Premium <input  name="dep_amnt" type="number" class="form-control" placeholder="" required></label>    
                    </div>
                        <!-- <span name=msg1></span> -->
                        <button type="submit" name="submitTrans" class="btn btn-primary">Pay Premium</button>
                    </form>
                    </div>
                </div>
    
            </div>
            
            </div>
            
            <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            <div class="card-footer text-muted">
                Powered by: sureDrive Inc
            </div>
    
            </div>
    
        </div>

        <div class="tab-pane fade" id="pills-claims" role="tabpanel" aria-labelledby="pills-claims-tab">
        <div class="card text-center">
            <div class="card-header">
                Transaction Section
            </div>
            <div class="card-body">
            <form action="handleForm.php" method="post">
             
                <div class="form-group">
                    <label >Insurance ID<input name="inID" type="text" class="form-control" placeholder="" required></label>    
                </div>
                <div class="form-group">
                    <label >Nature of Disaster<input  name="disaster" class="form-control" placeholder="" required></label>    
                </div>
                <button type="submit" name="submitClaim" class="btn btn-primary">Make Claim</button>
            </form>
            </div>
            <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            <div class="card-footer text-muted">
                Powered by: sureDrive Inc
            </div>
    
            </div>
    
        </div>

        

           
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>