<?php
include_once ("/common/base.php");
if(isset($_SESSION['eid']))
$eid=$_SESSION['eid'];
else
{echo json_encode(array('error' => 0, 'result' => 'session not set'));
$eid=2;
}
$start = (time()-(31*24*60*60));	
$end   = (time()+(31*24*60*60));
$sql = "SELECT * FROM `bookings` WHERE eid=$eid and unix_timestamp(`starttime`) between ? and ? ";
$stmt=$db->prepare($sql);
$row=$stmt->execute(array($start,$end));     

$out = array();
if($row)
while($result=$stmt->fetch()) {
	$sql2 = "SELECT name FROM `users` WHERE id=? limit 1";
	$stmt2=$db->prepare($sql2);
	$stmt2->execute(array($result['userid']));
	$name=$stmt2->fetch();
	
	
	$out[] = array(
        "id" => $result['id'],
        "title" => "Name: ".$name[0],
        "url" => "http://www.example.com/",
		"class"=> "event-important",
        "start" => strtotime($result['starttime']).'000',
        "end" => strtotime($result['endtime']).'000'
    );
}

$sql3 = "SELECT * FROM `adminbookings` WHERE eid=$eid and unix_timestamp(`starttime`) between ? and ? ";
$stmt4=$db->prepare($sql3);
$row4=$stmt4->execute(array($start,$end));     
if($row)
while($result2=$stmt4->fetch()) {
	$sql4 = "SELECT name FROM `admin` WHERE id=? limit 1";
	$stmt5=$db->prepare($sql4);
	$stmt5->execute(array($result2['userid']));
	$adminname=$stmt5->fetch();
	
	
	$out[] = array(
        "id" => $result2['id'],
        "title" => "Name: ".$adminname[0],
        "url" => "http://www.example.com/",
		"class"=> "event-important",
        "start" => strtotime($result2['starttime']).'000',
        "end" => strtotime($result2['endtime']).'000'
    );
}
echo json_encode(array('success' => 1, 'result' => $out));
?>