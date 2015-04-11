<?php
	require_once "/inc/core.inc.php";
	function createtime($time,$date)
	{
			list($time_hr, $time_min, $time_sec) = explode(":", $time);
			list($date_day, $date_mon, $date_year) = explode("-", $date);
			$date_day=intval($date_day);
			$date_mon=intval($date_mon);
			$date_year=intval($date_year);
			$time_hr =intval($time_hr);
			$time_min=intval($time_min);
			$time_sec=intval($time_sec);
			$donetime=mktime($time_hr,$time_min,$time_sec,$date_mon,$date_day,$date_year);
			$donetime=$donetime-3*3600-30*60;
			return $donetime;
	}
	
	
	
	
	if(isset($_POST['starttime'])&&isset($_POST['startdate'])&&!empty($_POST['startdate'])&&!empty($_POST['starttime'])&&isset($_POST['endtime'])&&!empty($_POST['endtime']))
	{
			$ans=0;
			$ans1=0;
			$ans2=0;
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$eid=$_SESSION['eid'];
			$date=$_POST['startdate'];
			$start=$_POST['starttime'];
			$end=$_POST['endtime'];
		//	$date='29-04-2015';
		//	$start='20:10:00';
			$stime=createtime($start,$date);
			$etime=createtime($end,$date);
			/* if($_SESSION['usertype']=='admin')
			$sql = "SELECT count(*) as thecount FROM `adminbookings` WHERE unix_timestamp(`endtime`) > :stime and unix_timestamp(`starttime`) < :stime and eid = :eid"; 			 */
			$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timestamp(`endtime`) > :stime and unix_timestamp(`starttime`) < :stime and eid = :eid"; 			
			$stmt=$db->prepare($sql);
			$stmt->bindParam(':stime',$stime,PDO::PARAM_INT);
			$stmt->bindParam(':stime',$stime,PDO::PARAM_INT);
			$stmt->bindParam(':eid',$eid,PDO::PARAM_INT);
			try{
			$stmt->execute();}catch(PDOException $e){
			echo json_encode("error query not executed".$e->getMessage()."\n");}
			$result=$stmt->fetch(PDO::FETCH_BOTH);
			if($result['thecount'] != 0)
				$ans=0;
			else
				$ans=1; 
		
			
			
			//$sql = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timpstamp(`endtime`) > :end and unix_timpstamp(`starttime`) < :end  ";
			
			$sql2 = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timestamp(`endtime`) > :end and unix_timestamp(`starttime`) < :end  and eid = :eid";			
			$stmt2=$db->prepare($sql2);
			$stmt2->bindParam(':end',$etime,PDO::PARAM_INT);
			$stmt2->bindParam(':end',$etime,PDO::PARAM_INT);
			$stmt2->bindParam(':eid',$eid,PDO::PARAM_INT);
			try{
			$stmt2->execute();}catch(PDOException $e){
			echo json_encode("error query not executed".$e->getMessage()."\n");}
			$result=$stmt2->fetch(PDO::FETCH_BOTH);
			if($result['thecount']!=0)
				$ans1=0;
			else
				$ans1=1;
				
			
			$sql3 = "SELECT count(*) as thecount FROM `bookings` WHERE unix_timestamp(`endtime`) < :end and unix_timestamp(`starttime`) > :start  and eid = :eid";			
			$stmt3=$db->prepare($sql3);
			$stmt3->bindParam(':end',$etime,PDO::PARAM_INT);
			$stmt3->bindParam(':start',$stime,PDO::PARAM_INT);
			$stmt3->bindParam(':eid',$eid,PDO::PARAM_INT);
			try{
			$stmt3->execute();}catch(PDOException $e){
			echo json_encode("error query not executed".$e->getMessage()."\n");}
			$result=$stmt3->fetch(PDO::FETCH_BOTH);
			if($result['thecount']!=0)
				$ans2=0;
			else
				$ans2=1;
			
			
			if($ans==0)
				{
				echo json_encode("Sorry the start time is clashing with a booking");
				return;
				}	
				
			if($ans1==0)
				{
				echo json_encode("Sorry the end time is clashing with a booking");
				return;
				}
				
			if($ans2==0)
				{echo json_encode("Sorry there is a booking clashing with this booking");
				return;}
			
			
			
		
		echo json_encode(true);}
 ?>
