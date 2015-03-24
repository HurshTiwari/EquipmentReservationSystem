<?php
include_once('\inc\connect.inc.php');
if(isset ($_SESSION['username'])&&isset ($_SESSION['ename']))
{
	if(isset ($_POST['starttime'])&&isset ($_POST['endtime'])&&!empty($_POST['endtime'])&&!empty($_POST['starttime']))
	{
	
	}
}
else
header ('login.php');
?>