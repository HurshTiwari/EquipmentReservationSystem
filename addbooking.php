<?php
require_once ("/inc/core.inc.php");
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
$username=$_SESSION['username'];
//$ename=$_POST['ename'];
$ename=$_SESSION['ename'];//temporary
$sdate=$_POST['sdate'];
$_SESSION['sdate']=$sdate;
include_once ("/common/head.php");
include_once ("/common/navbar_top_side.php");
?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>Perform Booking</h1></center></div>
	<form name="myForm" role="form" action="booking2.php" method="POST" onSubmit="myFunction(this)">
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="<?php echo $username;?>" readonly></input>
		</div>
		<div class="form-group">
		<label for="ename">Equipment Name:</label><input type="text" id ="ename" value="<?php echo $ename;?>"readonly></input>
		</div>
		<div class="form-group">
		<label for="sdate">Start Date:</label><input type="date" id ="sdate" value="<?php echo $sdate;?>"readonly></input>
		</div>
		<div class="form-group">
		<label for="name">Start Time:</label><input type="time" id ="starttime" placeholder="hh:mm:ss"></input>
		</div>
		<div class="form-group">
		<label for="name">End Time:</label><input type="time" id ="endtime" placeholder="hh:mm:ss"></input>
		</div>
		<button class=".btn-success" type="submit">Book It!</button>
	</form>
	</div>
</div>

/* <script> */
function myFunction($this) {
	var k=1;
	var y = document.getElementById("sdate").value;
	var q=y.split('-');
		var i=0;
		while(i<3)
		{
			k=k*q[i];
		}
	var day_cal=k;
    var x = document.getElementById("starttime").value;
    var p=x.match('/\d{2}:\d{2}:\d{2}');
	if (p.length())
	{	var i=0;
		while(i<p.length())
		{
			k=k*p[i];
		}
	}
	var start=document.createElement("input");
	var att=document.createAttribut("id");
	att.value="start";
	start.type="hidden";
	start.value=k*1000;
	alert("start done: "+start.value);
	start.appendTo(this);
	var x1 = document.getElementById("endtime").value;
    var p=x1.match('/\d{2}:\d{2}:\d{2}');
	k=day_cal;
	if (p.length())
	{	var i=0;
		while(i<p.length())
		{
			k=k*p[i];
		}
	}
	var end=document.createElement("input");
	var att=document.createAttribut("id");
	att.value="end";
	end.type="hidden";
	end.value=k*1000;
	alert("end done:"+end.value);
	end.appendTo(this);
}
</script>
<?php
include_once ("/common/close.php");}
else
{
  include 'login.php';  
}
?>