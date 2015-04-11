<?php
include_once('/inc/core.inc.php');
if(isset ($_SESSION['user_id'])&&isset ($_SESSION['ename']))
{
include_once ("/common/head.php");
include_once ("/common/navbar_top_side.php");
?>
<div id="page-wrapper">
<?php
	if(isset ($_POST['starttime'])&&isset ($_POST['endtime'])&&isset ($_POST['startdate'])&&!empty($_POST['startdate'])&&!empty($_POST['endtime'])&&!empty($_POST['starttime']))
	{	$id=$_SESSION['user_id']['id'];
		$eid=$_SESSION['eid'];
		$username=$_SESSION['user_id']['id'];
		$date=$_POST['startdate'];
		$start= $_POST['starttime'];
		list($start_hr, $start_min, $start_sec) = explode(":", $start);
		//echo"start: hr=".$start_hr."\tmin=".$start_min."\tsec=".$start_sec;
		$end= $_POST['endtime'];
		list($end_hr, $end_min, $end_sec) = explode(":", $end);
		//echo"\n end: hr=".$end_hr."\tmin=".$end_min."\tsec=".$end_sec;
		list($date_day, $date_mon, $date_year) = explode("-", $date);
		$date=$date_year.'-'.$date_mon.'-'.$date_day;
		//echo "date=".$date;
		$date_day=intval($date_day);
		$date_mon=intval($date_mon);
		$date_year=intval($date_year);
		//echo"\n date: day=".$date_day."\tmon=".$date_mon."\tyear=".$date_year;
		$start_hr=intval($start_hr);
		$start_min=intval($start_min);
		$start_sec=intval($start_sec);
		$end_hr =intval($end_hr);
		$end_min=intval($end_min);
		$end_sec=intval($end_sec);
		
		
		
		
		$stime=mktime($start_hr,$start_min,$start_sec,$date_mon,$date_day,$date_year);
		$etime=mktime($end_hr,$end_min,$end_sec,$date_mon,$date_day,$date_year);
		
		//echo"Starttime:".$stime."\tEndtime: ".$etime;
		if($_SESSION['usertype']=='admin')
		$sql = "INSERT INTO `ers`.`adminbookings` (`date`, `starttime`, `endtime`, `userid`, `eid`) VALUES (?,?,?,?,?)";
		elseif($_SESSION['usertype']=='user')
		$sql = "INSERT INTO `ers`.`bookings` (`date`, `starttime`, `endtime`, `userid`, `eid`) VALUES (?,?,?,?,?)";
		$stmt=$db->prepare($sql);
		$result=$stmt->execute(array($date,date('Y-m-d H:i:s',$stime),date('Y-m-d H:i:s',$etime),$id,$eid));
		if($result)
			{
			echo "Success! Ypur booking has been made.<a href='index.php'>Go Back</a>";
			unset($_SESSION['eid'],$_SESSION['ename'],$_SESSION['sdate']);
			}
		else
			{
			echo "Error! Something went wrong.<a href='addbooking.php'>Please try again!</a>";
			}
		
	}
	else
	echo "Sorry it appears the data sent has not been recived.<a href='test.php'>Please try again</a>"; 
?>
<?php
include_once ("/common/close.php");}
else
header ('login.php');
?>