<?php
    //connect to the core file for general configuration
    require("../settings/core.php");

    //check for login
    //check_login();

    //include the controller
    require('../controllers/accountcontroller.php');
  
    //define avaribale for contact listing
	$user_account;
    $a=$_SESSION["email"];
    
	global $user_account; 
    //run the function to return all contact
    $user_account = view_statement_fxn($a);
    $all_clients=view_all_clients();
    $all_claims = get_all_claims();
        
        

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
        <!-- <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">View All clients</a>
         </li>  -->
        <li class="nav-item">
          <a class="nav-link" id="pills-claims-tab" data-toggle="pill" href="#pills-claims" role="tab" aria-controls="pills-claims" aria-selected="false">View Claims</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
       
            <?php
                if($all_clients){
                    foreach ($all_clients as $client) {
                        //echo $client['fname'];

                        # code...
                        //echo "<li class='list-group-item'>". $contact['pname']." - ".$contact['pphone']." <a href='addcontact.php?ppid=$uuid'>edit</a> | <a href='#' onclick='delcontact($uuid)'>delete</a> </li>";
                    //     echo "<div class='card-body'>";
                        echo"<div class='card text-center'>";
                            echo"<div class='card-header'>";
                                echo "Account Statement";
                            echo"</div>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>User's Balance is : <span name='acctbal'><strong>".$client['amount']." cedis</strong></span></h5>";
                                echo "<p class='card-text'>Account number : <span name='actnum'><strong>".$client['anum']."</strong> </span></p>";
                                echo "<p class='card-text'>First Name of Account Holder: <span name='fname'><strong>".$client['fname']."</strong> </span></p>";
                                echo "<p class='card-text'>Last Name of Account Holder: <span name='lname'><strong>".$client['lname']." </strong></span></p>";
                                echo "<p class='card-text'>Account Type: <span name='acttype'><strong>".$client["acctype"]." </strong></span></p>";
                            echo "</div>";
                        echo "</div>"; 
                    }
                }
            ?>
            <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            <div class="card-footer text-muted">
                Powered by: sureDrive
            </div>
        </div>
        
        
        <div class="tab-pane fade" id="pills-claims" role="tabpanel" aria-labelledby="pills-claims-tab">
        <div class="card text-center">
            <div class="card-header">
                Pending Claims
            </div>
            <div class="card-body">
            <?php
                if($all_claims){
                    foreach ($all_claims as $claims) {
                        //echo $client['fname'];

                        # code...
                        //echo "<li class='list-group-item'>". $contact['pname']." - ".$contact['pphone']." <a href='addcontact.php?ppid=$uuid'>edit</a> | <a href='#' onclick='delcontact($uuid)'>delete</a> </li>";
                    //     echo "<div class='card-body'>";
                        echo"<div class='card text-center'>";
                            
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>User's Balance is : <span name='acctbal'><strong> GHS".$claims['amount']." </strong></span></h5>";
                                echo "<p class='card-text'>InsuranceID : <span name='actnum'><strong>".$claims['accNumber']."</strong> </span></p>";
                                echo "<p class='card-text'>First Name of Account Holder: <span name='fname'><strong>".$claims['fname']."</strong> </span></p>";
                                echo "<p class='card-text'>Last Name of Account Holder: <span name='lname'><strong>".$claims['lname']." </strong></span></p>";
                                echo "<p class='card-text'>Account Type: <span name='acttype'><strong>".$claims["acctype"]." </strong></span></p>";
                                echo "<p class='card-text'>Phone Number: <span name='acttype'><strong>".$claims["phone"]." </strong></span></p>";
                                echo "<p class='card-text'>Reason for Claim: <span name='acttype'><strong>".$claims["disaster"]." </strong></span></p>";


                            echo "</div>";
                        echo "</div>"; 
                    }
                }else{
                    echo   "Check for error!";
                }
            ?>
            </div>
            
            </div>
            <a href="../login/logout.php" class="btn btn-primary">Logout</a>
            <div class="card-footer text-muted">
                Powered by: sureDrive
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