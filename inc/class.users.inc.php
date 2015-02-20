<?php
//class of users
class users{
private $_db;
 
 public function __construct($db=NULL)
    {
        if(is_object($db))
        {
            $this->_db = $db;
        }
        else
        {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }
	

 public function createAccount()
    {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$rollno=$_POST['rollno'];
		$email=$_POST['email'];		
        $sql = "SELECT COUNT (username) AS theCount
                FROM users
                WHERE Username=:user";
        if($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":user", $username, PDO::PARAM_STR);
            try{$stmt->execute();} catch(PDOException $e) {echo "<div>ERROR: ".$e->getMessage()."</div>";}
            $row = $stmt->fetch();
            if($row['theCount']!=0) {
                return "<h2> Error </h2>"
                    . "<p> Sorry, that username is already in use. "
                    . "Please try again. </p>";
            }
            /*if(!$this->sendVerificationEmail($u, $v)) {
                return "<div class="page-wrapper"><div class="huge"><h2> Error </h2>"
                    . "<p> There was an error sending your"
                    . " verification email. Please "
                    . "<a href="mailto:help@coloredlists.com">contact "
                    . "us</a> for support. We apologize for the "
                    . "inconvenience. </p></div></div>";
            }*/
            $stmt->closeCursor();
        }
		
        $sql = "INSERT INTO addusers(name, password, email, rollno,tempaddress,peraddress)
                VALUES(:user, :pass, :email,:rollno,:tempaddress,:peraddress)";
        if($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(":user", $username, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
			$stmt->bindParam(":rollno", $rollno, PDO::PARAM_STR);
			//$stmt->bindParam(":tempaddress", $password, PDO::PARAM_STR);		--tempaddress
			//$stmt->bindParam(":peraddress", $password, PDO::PARAM_STR);		--peraddress, photo,phoneno
            try{$stmt->execute();} catch(PDOException $e) {echo "<div>".$e->getMessage()."</div>";}
            $stmt->closeCursor();
            return "<h2> Success! </h2>"
                    . "<p> Your request for account has been added"
                    . "with the username <strong>$username</strong>."
                    . "Your account will be activated when the admin accepts your request";
            }
        else {
            return "<h2> Error </h2><p> Couldn't insert the "
                . "user information into the database. </p>";
        }
    }
}
		
		
 
   


?>