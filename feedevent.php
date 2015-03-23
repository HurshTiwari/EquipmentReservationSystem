<?php
include_once ("/common/base.php");
$start = (time()-(31*24*60*60));	
$end   = (time()+(31*24*60*60));
$sql = "SELECT * FROM `bookings` WHERE unix_timestamp(`starttime`) between ? and ? ";
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


echo json_encode(array('success' => 1, 'result' => $out));
?>