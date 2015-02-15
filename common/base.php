<?php
    // Set the error reporting level
    error_reporting(E_ALL);         // It will report each and every report occurs on our site
	                                // During Developement 
    ini_set("display_errors", 1);   // It will ensure about even notices

    // Start a PHP session. .
    session_start();                // This will allow users to stay logged in when we 
	                                //build that functionality later.

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