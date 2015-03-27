<?php

require_once '/inc/core.inc.php';
include_once ("/common/head.php");
if(isset($_SESSION['user_id'])){
$userid=$_SESSION['user_id'];
$type=$_SESSION['usertype'];
include_once ("/common/navbar_top_side.php");
?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>New User Requests</h1></center></div>
	
	<div class="row">
	<form action="cancel.php" method="POST">
<?php
			if($type=="user")
			{$sql= "select * from bookings where userid=? ";}
			elseif($type=="admin")
			{$sql= "select * from adminbookings where userid=? ";}
			
			$stmt=$db->prepare($sql);
			$qresult=$stmt->execute(array($userid['id']));
			if(!$qresult)
			{
				echo "Can't fetch the records";
			}

			echo '<table align="center" width = "80%"><tr><th>Equipment Name</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Check to Remove</th></tr>';
			while ($results =$stmt->fetch()){

			$id=$results['id'];
			$sql2= "select name from equipments where id=:in";
			$stmt2=$db->prepare($sql2);
			$stmt2->bindParam(':in',$id,PDO::PARAM_INT);
			$qresult=$stmt2->execute();
			$r_name=$stmt2->fetch();
			$name=$r_name[0];
			$date=$results['date'];
			$start=$results['starttime'];
			$end=$results['endtime'];
			
			//$img=$results['img'];
			?>
			<div class="form-group">
				
			<?php
					echo '<tr><td>'.$name.'</td><td>'.$date.'</td><td>'.$start.'</td><td>'.$end.'</td><td><input type="checkbox" name="check_list[]" value='.$id.'></td></tr>';
			?>
			</div>
		<?php } ?>
			<div class="form-group">
			<center><button class=".btn-important" type="submit">Cancel Selected Bookings</button></center>
			</div>
		</form>
		</div>
		
	</div>
<?php		
include_once("/common/close.php");
}
else
header ("Location: login.php");
?>