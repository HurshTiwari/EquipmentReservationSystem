<?php
include_once ("common/base.php");
$start = time()-(31*24*60*60);	
$end   = time()+(31*24*60*60);
$sql = "SELECT * FROM `bookings` WHERE UNIX_TIMESTAMP(`starttime`) between ? and ?";
$stmt=$db->prepare($sql);
$row=$stmt->execute(array($start,$end));     

$out = array();
if($row)
while($result=$stmt->fetch()) {
	$sql2 = "SELECT name FROM `users` WHERE id=? limit 1";
	$stmt2=$db->prepare($sql2);
	$stmt2->execute(array($result['userid']));
	$name=$stmt2->fetch();
	$stmt2->closeCursor();
	
	$sql7="SELECT name FROM `equipments` WHERE id= ? limit 1";
	$stmt8=$db->prepare($sql7);
	$stmt8->execute(array($result['eid']));
	$equipname=$stmt8->fetch();
	$stmt8->closeCursor();
	
	$out[] = array(
        "id" => $result['id'],
        "title" => "Name: ".$name[0]."<br>Equipment Name:".$equipname['name'] ,
        "url" => "viewbooking.php?id=".$result['userid']."&eid=".$result['eid']."&type=user&starttime=".(strtotime($result['starttime'])-16200+3600),
		"class"=> "event-important",
        "start" => (strtotime($result['starttime'])-16200+3600).'000',
        "end" => (strtotime($result['endtime'])-16200+3600).'000'
    );
}

$sql3 = "SELECT * FROM `adminbookings` WHERE unix_timestamp(`starttime`) between ? and ? ";
$stmt4=$db->prepare($sql3);
$row4=$stmt4->execute(array($start,$end));     
if($row)
while($result2=$stmt4->fetch()) {
	$sql4 = "SELECT name FROM `admin` WHERE id=? limit 1";
	$stmt5=$db->prepare($sql4);
	$stmt5->execute(array($result2['userid']));
	$adminname=$stmt5->fetch();
	$stmt5->closeCursor();
	
	$sql5="SELECT name FROM `equipments` WHERE id= ? limit 1";
	$stmt6=$db->prepare($sql5);
	$stmt6->execute(array($result2['eid']));
	$equipname=$stmt6->fetch();
	$stmt6->closeCursor();
	
	$out[] = array(
        "id" => $result2['id'],
        "title" => "Name: ".$adminname[0]."<br>Equipment Name: ".$equipname['name'],
        "url" => "viewbooking.php?id=".$result2['userid']."&eid=".$result2['eid']."&type=admin&starttime=".(strtotime($result2['starttime'])-16200+3600),
		"class"=> "event-important",
        "start" => strtotime($result2['starttime']).'000',
        "end" => strtotime($result2['endtime']).'000'
    );
}
echo json_encode(array('success' => 1, 'result' => $out));
?>