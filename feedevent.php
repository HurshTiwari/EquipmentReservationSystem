<?php
include_once ("/common/base.php");
$start = time()/ 1000;
$end   = (time()+(1*24*60*60))/ 1000;
$stmt   =$db->prepare('SELECT * FROM bookings WHERE `starttime` BETWEEN ? and ?');
    

$out = array();
foreach($stmt->execute(array($start,$end),PDO::FETCH_ASSOC) as $row) {
    $out[] = array(
        'id' => $row->id,
        'title' => $row->eid,
        'url' => Helper::url($row->id),
        'start' => strtotime($row->starttime) . '000',
        'end' => strtotime($row->endtime) .'000'
    );
}

echo json_encode(array('success' => 1, 'result' => $out));
?>