<?php

    
	/*$DB_HOST='localhost';
    $DB_USER='root';
    $DB_PASS='';
    $DB_NAME='login';
    $link=mysqli_connect('localhost','root','','login') or die('could not connect');
    @mysqli_select_db($DB_NAME);  //selecting database
	echo "connected <br>";*/
	
	
	// Database credentials
    /*define('DB_HOST', 'localhost');     
    define('DB_USER', 'root');        
    define('DB_PASS', '');            // It defines 'DB_PASS' as Database "Password" which is null here;
    define('DB_NAME', 'ers');       // It defines 'DB_NAME' as Database name;
    
	$link=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME) or die('could not connect');  //it makes a connection tothe database using hostname,user,password and db name
    //else it terminates the page at this point stating 'couldnt connect'*/
    
	
	// Include site constants
    include_once "inc/constants.inc.php";              

    // Create a database object                        // Try_Catch both - gives us the ability to use Exceptions, 
	                                                   //which help improve error handling. 
    try {                                                 
	$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $db = new PDO($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo '<div class="huge">Connection failed: ' . $e->getMessage().'</div>';  // If BD connection fails, it will display 
                                                        // a message like here "Connection failed"		
        exit;                              
    }                           
    
	
?>