<?php
	require_once "/inc/core.inc.php";
	if(isset($_POST['starttime'])&&isset($_POST['startdate'])&&!empty($_POST['startdate'])&&!empty($_POST['starttime']))
		{
			$date=$_POST['startdate'];
			$start=$_POST['starttime'];
			$equipment=$_SESSION['eid'];
			list($start_hr, $start_min, $start_sec) = explode(":", $start);
			list($date_day, $date_mon, $date_year) = explode("-", $date);
			$date_day=intval($date_day);
			$date_mon=intval($date_mon);
			$date_year=intval($date_year);
			$start_hr =intval($start_hr);
			$start_min=intval($start_min);
			$start_sec=intval($start_sec);
			$etime=mktime($start_hr,$start_min,$start_sec,$date_mon,$date_day,$date_year);
		
			if($_SESSION['usertype']=='admin')
			$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timpstamp(`endtime`) > :start and unix_timpstamp(`starttime`) < :start  ";
			else if($_SESSION['usertype']=='user')
			$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timpstamp(`endtime`) > :start and unix_timpstamp(`starttime`) < :start "; ;
	
			$stmt=$db->prepare($sql);
			$stmt->bindParam(':start',$start,PDO::PARAM_STR);
			$stmt->bindParam(':start',$start,PDO::PARAM_STR);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			if($result['thecount']!=0)
				echo "false";
			else
				echo "true";
		}
	else if(isset($_POST['endtime'])&&isset($_POST['startdate'])&&!empty($_POST['startdate'])&&!empty($_POST['endtime']))
	{	
			$date=$_POST['startdate'];
			$end=$_POST['endtime'];
			$equipment=$_SESSION['eid'];
			list($end_hr, $end_min, $end_sec) = explode(":", $end);
			list($date_day, $date_mon, $date_year) = explode("-", $date);
			$date_day=intval($date_day);
			$date_mon=intval($date_mon);
			$date_year=intval($date_year);
			$end_hr =intval($end_hr);
			$end_min=intval($end_min);
			$end_sec=intval($end_sec);
			$etime=mktime($end_hr,$end_min,$end_sec,$date_mon,$date_day,$date_year);
		
			if($_SESSION['usertype']=='admin')
			$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timpstamp(`endtime`) > :end and unix_timpstamp(`starttime`) < :end  ";
			else if($_SESSION['usertype']=='user')
			$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timpstamp(`endtime`) > :end and unix_timpstamp(`starttime`) < :end "; ;
	
			$stmt=$db->prepare($sql);
			$stmt->bindParam(':end',$end,PDO::PARAM_INT);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			if($result['thecount']!=0)
				echo "false";
			else
				echo "true";
	}
	else
		echo "false";
 ?>
