<?php

require_once '/inc/core.inc.php';
include_once ("/common/head.php");
if(isset($_SESSION['usertype'])&&isset($_SESSION['user_id'])){
	if($_SESSION['usertype']=='admin'){
include_once ("/common/navbar_top_side.php");
?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>All Users</h1></center></div>
<?php
			$sql= "select * from users";
			$stmt=$db->prepare($sql);
			$qresult=$stmt->execute();
			if(!$qresult)
			{
				echo "Can't fetch the records";
			}

			echo '<table align="center" width = "80%"><tr><th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th></tr>';
			while ($results =$stmt->fetch()){

			$id=$results['rollno'];
			$name=$results['name'];
			$address=$results['tempaddress'];
			$email=$results['email'];
			$phone=$results['phoneno'];
			//$img=$results['img'];
			?>
			<div>
				
			<?php
					echo '<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$address.'</td><td>'.$email.'</td><td>'.$phone.'</td></tr>';
			?>
			</div>
		<?php } ?>
	</div>
<?php		}
	}
include_once("/common/close.php");
?>