<?php

//connect to db
require("../settings/database_class.php");

//account class to handle bank account details

class account_class extends db_connection{



    public function add_new_account($a,$b,$c,$d,$e,$f){
        //sql statement
		$sql ="INSERT INTO `InsuranceAccount` (`anum`, `fname`,`lname`,`amount`,`acctype`, `pphone`) VALUES
        ('$a', '$b', '$c','$d','$e','$f')";
        //execute statement
        return $this->db_query($sql);
        
    }
    public function search_for_account($sterm){
		//a query to search accounts matching term
		$sql = "SELECT * FROM InsuranceAccount WHERE anum LIKE '%$sterm%'";

		//execute the query
		return $this->db_query($sql);
	}

    public function view_account_statement($email){
        //query to check account  statement
        $sql = "SELECT `anum`, `fname`, `lname`, `amount`, `acctype`, `phone`, `email` 
        FROM `Users` WHERE email = '$email'";
        //execute command
        //echo($sql);
        return $this->db_query($sql);
    }
    public function view_all_statements(){
        //query to check account  statement
        $sql = "SELECT * FROM Users";
        //execute command
        //echo($sql);
        return $this->db_query($sql);
    }
    
    public function view_account_balance($accn){
        //query to check account  statement
        $sql = "SELECT amount FROM Users WHERE anum=$accn";
        //execute command
        //echo($sql);return true;
        //echo($this->db_query($sql);
        return $this->db_query($sql);
    }

    public function change_account_balance($a,$b){
		$sql = "UPDATE Users SET `amount`='$b' WHERE anum=$a";
        //execute the query
        return $this->db_query($sql);
    }

    public function check_for_withdraw($a,$b){
        $sql = "SELECT amount FROM Users WHERE anum=$a";
        //execute it
        $dbamnt= $this->db_query($sql);
        //$dbamnt=$this->view_account_balance($a);//$this.db_query($sql);
        //echo("albett");
        echo($dbamnt);
        var_dump($dbamnt);echo("albert");return false;
        //if dbamnt>$a, thne allow it
        if ($dbamnt<=$b){
            return false;
        }
        return $this->dbamnt;
    }
    // public function transfer_amount($a,$b,$c){
    //do it in the controller instead 
    // }

    public function update_account($a,$b,$c,$d,$e){
        $sql="UPDATE Users SET fname= '$b', lname='$c', acctype='$d',phone='$e'  WHERE anum = $a";
        //execute
        echo($sql);
        return $this->db_query($sql);
    }


    public function delete_account($a){
        $sql = "DELETE from InsuranceAccount WHERE anum=$a";
        //execute
        return $this->db->query($sql);
    }

    // public function transfer_amount($a,$b){
    //     $sql=""
    // }
}

class claim_class extends db_connection
{
	
	public function view_claims(){
		//a query to get all claims
		$sql = "SELECT Users.fname,Users.lname,Users.amount,
        Users.acctype,Users.phone, claims.disaster,claims.accNumber
        FROM Users, claims WHERE Users.anum = claims.accNumber";
		//echo($sql);
		//return false;
		//execute the query
		return $this->db_query($sql);
    }
    
    public function add_new_claim($a,$b){
        //sql statement
		$sql ="INSERT INTO `claims` (`disaster`,`accNumber`) VALUES
        ('$a', '$b')";
        //execute statement
        return $this->db_query($sql);
        
    }

    public function delete_claim($a){
		//a query to delete contact using an id
		$sql = "DELETE from claims WHERE insuranceID=$a";
		
		//execute the query
		return $this->db_query($sql);
	}


}



?>