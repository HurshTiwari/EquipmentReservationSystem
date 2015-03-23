<?php
require_once ("/inc/core.inc.php");
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
$username=$_SESSION['username'];
//$ename=$_POST['ename'];
$ename="equipment3";//temporary
$sdate=$_POST['sdate'];

include_once ("/common/head.php");
//include_once ("/common/navbar_top_side.php");
echo $sdate;
?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center>Perform Booking</center></div>
	<form role="form" action="addbooking.php" method="POST">
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="<?php echo $username;?>"></input>
		</div>
		<div class="form-group">
		<label for="ename">Equipment Name:</label><input type="text" id ="ename" value="<?php echo $ename;?>"></input>
		</div>
		<div class="form-group">
		<label for="sdate">Start Date:</label><input type="date" id ="sdate" value="<?php echo $sdate;?>"></input>
		</div>
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="<?php echo $username;?>"></input>
		</div>
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="<?php echo $username;?>"></input>
		</div>
	</div>
</div>
<?php
include_once ("/common/close.php");}
else
{
  include 'login.php';  
}
?>