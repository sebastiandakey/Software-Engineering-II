<?php

//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/accountcontroller.php");


//check if signup button was clicked 
if (isset($_POST['submitForm'])) {
	
    //grab form details 
    //$a=$POST['uid'];
    
    $fname_new = $_POST['update_fname'];
    $lname_new = $_POST['update_lname'];
    // $accnum_new = $_POST['update_accnum'];
    $acctype_new = $_POST['update_acctype'];
    $pphone_new = $_POST['update_pnum'];
    
    $userExists=add_account_fxn($_SESSION["email"],$fname_new,$lname_new,0,$acctype_new,$pphone_new);

    if($userExists){
        //echo("fianu is runnig away");
        //check if update is true
        $check_update = update_account_fxn($_SESSION["account_num"],$fname_new,$lname_new,$acctype_new,$pphone_new);
        //echo($check_update);return false;
        
        //check if  it was successful
        if($check_update){
            
            //redirection to main page
				header('Location: main.php');
				//to make sure the code below does not execute after redirection
				exit;
        }
    }else{
        echo("uncessfull update");
    }
	
}

//check if make claim button was clicked 
if (isset($_POST['submitClaim'])) {
	
    //grab form details 
    //$a=$POST['uid'];
    
    $insuranceID = $_POST['inID'];
    $disaster = $_POST['disaster'];
    

    //add claim into the database
    $claim_insert = create_new_claim($disaster,$insuranceID);
    
    

    if ($claim_insert){
        //redirection to main page
        echo "<script> alert('Your Claim has been Submitted Successfully!');window.location='main.php'</script>";
		//header('Location: ');
		//to make sure the code below does not execute after redirection
		exit;
    }else{
        echo "<script> alert('Claim Submission Unsuccessful!');window.location='main.php'</script>";
    }
	
}



?>