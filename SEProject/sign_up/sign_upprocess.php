<?php
//for header redirection
ob_start();

//start session - needed to capture login information 
session_start(); 

//connnect to the controller
require("../controllers/logincontroller.php");


//check if signup button was clicked 
if (isset($_POST['usign_up'])) {
	$accNum = rand(1000000000,10000000000);
    //grab form details 
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $policyType = $_POST["policyType"];
    $phone = $_POST["pnum"];
    $password = $_POST["upass"];
    $password_c = $_POST["upass_c"];
    $email = $_POST["email"];
    $amount = 0;

    

    if($password==$password_c){
        //check if signup is true
        $password_hash=sha1($password);
        $check_signup = create_new_login($email,$password_hash);
        $full_data = create_new_account($accNum,$fname,$lname,$amount,$policyType,$phone,$email);
        echo $accNum;
        //check if  it was successful
        if($check_signup && $full_data){
            //redirection to login page
				header('Location: ../login/login.php');
				//to make sure the code below does not execute after redirection
				exit;
        }else{
            echo "Something is wrong";
        }
    }else{
        echo("unsucessfull sign up");
        header('Location: sign_up.php');
    }
	
}

?>