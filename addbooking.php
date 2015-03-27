<?php
require_once "/inc/core.inc.php";
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
$ename=$_POST['ename'];
$ename=$_SESSION['ename'];
if(isset($_POST['sdate']))
$sdate=$_POST['sdate'];
else
$sdate=$_SESSION['sdate'];


$_SESSION['sdate']=$sdate;
include_once ("/common/head.php");
include_once ("/common/navbar_top_side.php");
?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>Perform Booking</h1></center></div>
	<form name="myForm" role="form" method="POST" action="booking2.php">
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="<?php echo $user_id['name'];?>" readonly></input>
		</div>
		<div class="form-group">
		<label for="ename">Equipment Name:</label><input type="text" name="ename" value="<?php echo $ename;?>"readonly></input>
		</div>
		<div class="form-group">
		<label for="sdate">Start Date:</label><input type="text" name="startdate" value="<?php echo $sdate;?>"></input>
		</div>
		<div class="form-group">
		<label for="name">Start Time:</label><input type="text" name="starttime" placeholder="hh:mm:ss"></input>
		</div>
		<div class="form-group">
		<label for="name">End Time:</label><input type="text" name="endtime" placeholder="hh:mm:ss"></input>
		</div>
		<button class=".btn-success" type="submit">Book It!</button>
	</form>
	</div>
</div>
<?php
include_once ("/common/close.php");}
else
{
  include 'login.php';  
}
?>