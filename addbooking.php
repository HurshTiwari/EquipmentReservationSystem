<?php
require_once "/inc/core.inc.php";
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
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
	
	
	<form name="myForm" id="myForm" role="form" method="POST" action="" class="form-vertical">
		<div class="form-group">
		<label for="username">Name:</label><input type="text" id ="username" value="<?php echo $user_id['name'];?>" readonly></input>
		</div>
		<div class="form-group">
		<label for="ename">Equipment Name:</label>   <input type="text" name="ename" id="ename" value="<?php echo $ename;?>"readonly></input>
		
		</div>
		<div class="form-group">
		
		<label for="startdate">Start Date:</label><input type="text" name="startdate" id="startdate" value="<?php echo $sdate;?>"readonly></input>
		
		</div>
		<div class="form-group">
		
		<label for="starttime">Start Time:</label><input type="text" name="starttime" id="starttime" placeholder="hh:mm:ss"></input>
		
		</div>
		<div class="form-group">
		<label for="endtime">End Time:</label><input type="text" name="endtime" id="endtime" placeholder="hh:mm:ss"></input>

		</div>
		<button class=".btn-success" type="submit">Book It!</button>

	</form>
	</div>
</div>
<script src="js/jquery.validate.js"></script>	
<script src="js/valid.js"></script>
<?php
include_once ("/common/close.php");}
else
{
  include 'login.php';  
}
?>