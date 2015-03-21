<?php

// Set the error reporting level
    //error_reporting(E_ALL);         // It will report each and every report occurs on our site
	                                // During Developement 
    //ini_set("display_errors", 1);   // It will ensure about even notices

require 'connect.inc.php';  
ob_start();//to use header functions
session_start();//have to do it for all sessions on all pages
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
{
$http_referer=$_SERVER['HTTP_REFERER']; 
}

?>