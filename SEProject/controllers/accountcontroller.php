<?php
//connect to the account class
require("../classes/accountClass.php");

//insert account function. 
function add_account_fxn($a, $b,$c,$d,$e,$f){
	//create an instance of contact class
	$newacc_object = new account_class();
	
	//run the add contact method
	$insertacc = $newacc_object->add_new_account($a, $b,$c,$d,$e,$f);
	if ($insertacc) {
		//return query result (boolean)
		return $insertacc;
	}else{
		return false;
	}
}

//insert account function. 
function update_account_fxn($a, $b,$c,$d,$e){
	//create an instance of contact class
	$newacc_object = new account_class();
	
	//run the add contact method
	$insertacc = $newacc_object->update_account($a,$b,$c,$d,$e);
	if ($insertacc) {
		//return query result (boolean)
		return $insertacc;
	}
	return false;
	
}

//search contact function - takes the search term
function search_account_fxn($stm){
	//Create an array variable
	$account_array = array();

	//create an instance of the contact class
	$account_object = new account_class();

	//run the search contact method
	$account_records = $account_object->search_for_account($stm);

	//check if the method worked
	if ($account_records) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $account_object->db_fetch()) {
			
			//Assign each result to the array
			$account_array[] = $one_record;
		}
	}
	//return the array
	return $account_array;
}
//search contact function - takes the search term
function view_statement_fxn($email){
	//Create an array variable
	$account_array = array();

	//create an instance of the contact class
	$account_object = new account_class();

	//run the search contact method
	$account_statement = $account_object->view_account_statement($email);
	//echo($account_statement);
	

	//check if the method worked
	if ($account_statement) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $account_object->db_fetch()) {
			//echo("echo yes sir");return false;
			//Assign each result to the array
			//var_dump($one_record);return false;
			$account_array[] = $one_record;
			//print_r($account_array);
		}
	}
	//return the array
	return $account_array;
}

function view_all_clients(){
	//Create an array variable
	$account_array = array();

	//create an instance of the contact class
	$account_object = new account_class();

	//run the search contact method
	$account_statement = $account_object->view_all_statements();
	//echo($account_statement);
	

	//check if the method worked
	if ($account_statement) {
		
		//loop to see if there is more than one result
		//fetch one at a time
		while ($one_record = $account_object->db_fetch()) {
			//echo("echo yes sir");return false;
			//Assign each result to the array
			//var_dump($one_record);return false;
			$account_array[] = $one_record;
			//print_r($account_array);
		}
	}
	//return the array
	return $account_array;
}


function view_balance_fxn($a){
    //create an instance of the contact class
    $account_object = new account_class();
    
    //run the search contact method
    $account_b = $account_object->view_account_balance($a);
    
    //check if the method worked
    if ($account_b) {
        
		//fetch the result
        $one_record = $account_object->db_fetch();
        return $one_record;
    }else{
        return false;
    }
}

function transfer_amount_fxn($rec,$amnt){
	 //create an instance of the contact class
	 $account_object = new account_class();
    
	 //run the search contact metho
	 $curr_amount=view_balance_fxn($rec);
	 
	 $new_amount=$curr_amount["amount"]+$amnt;
	 $account_b = $account_object->change_account_balance($rec,$new_amount);
	//echo($account_b);return true;//////////////////////////////
 
	 //check if the method worked
	 if ($account_b) {
		 
		 //fetch the result
		 //$one_record = $account_object->db_fetch();
		 return true;
	 }else{
		 return false;
	 }
}

function change_amount_fnx($a,$b,$fun){//param: accnt num, new ammount  to add, function
    //create an instance of the contact class
	$account_object = new account_class();
	$curr_amount=view_balance_fxn($a);
	
    //check for withdrawal or deposite
    if($fun==1){//1 for addition, 0 for subtraction
		//deposit
		//var_dump($curr_amount);
        $new_amount=$curr_amount["amount"]+$b;
        //run the update one contacat method
	$update_account = $account_object->change_account_balance($a, $new_amount);
    }else{//deduction
        //subtract from  amount
		if($curr_amount["amount"]-$b>=0){
			//$ablility_to_widthdraw=true;
			$new_amount=$curr_amount["amount"]-$b;
			$update_account = $account_object->change_account_balance($a, $new_amount);
			return true;
		}else{
			return false;
		}
		
	
    }
	

	//check if method worked
	if ($update_account) {
		
		//return query result (boolean)
		return $update_account;
	}
		//return false
		return false;
}

//delete a contact function - takes the id
function delete_account_fxn($a){
	//create an instance of the contact class
	$account_object = new account_class();

	//run the delete one contact method
	$delete_account = $account_object->delete_account($a);

	//check if method worked
	if ($delete_account) {
	
		//return query result (boolean)
		return $delete_account;
	}else{
		//return false
		return false;
	}
}

//function to get claim information - takes insurance account num
function get_all_claims(){
	//Create an array variable
	$claim_array = array();

	//create an instance of the login class
	$claim_object = new claim_class();

	//run the verify login method using the accnt num
	$claim_record = $claim_object->view_claims();

	//check if the method worked
	if ($claim_record) {
		//return $login_record;
		//fetch the from the result
		//$one_record = $login_object->db_fetch();
		//print_r($one_record);//return false;

		while ($one_record = $claim_object->db_fetch()) {
			//Assign each result to the array
			$claim_array[] = $one_record;
		}
		//assign to array
		//$login_array[] = $login_record;
		//var_dump($login_array);return false;
		return $claim_array;
		
	}
	echo("something went wrong");
	//return array;
	return false;
}

//function to set login information - takes account num
function create_new_claim($a,$b){
	//Create an array variable
	// $login_array = array();

	//create an instance of the login class
	$claim_object = new claim_class();

	//run the create login method using the accnt num n pass
	$claim_created = $claim_object->add_new_claim($a,$b);

	//check if the method worked
	if ($claim_created) {
		//fetch the from the result
		// $one_record = $login_object->db_fetch();
		//assign to array
        // $login_array[] = $one_record;
        return $claim_created;
	}else{
        return false;
    }
	//return array
	//return $login_array;
}

//delete a user function - takes the accn
function delete_user_claim($a){
	//create an instance of the contact class
	$claim_object = new claim_class();

	//run the delete one contact method
	$delete_claim = $claim_object->delete_claim($a);

	//check if method worked
	if ($delete_claim) {
	
		//return query result (boolean)
		return $delete_claim;
	}else{
		//return false
		return false;
	}
}

?>