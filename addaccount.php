<?php

require_once 'inc/core.inc.php';
include_once ("common/head.php");
if(isset($_SESSION['usertype'])&&isset($_SESSION['user_id'])){
	if($_SESSION['usertype']=='admin'){
include_once ("common/navbar_top_side.php");?>
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>New User Requests</h1></center></div>
	
	<div class="row">
	<form action="newuser.php" method="POST">
<?php
			$sql= "select * from addusers";
			$stmt=$db->prepare($sql);
			$qresult=$stmt->execute();
			if(!$qresult)
			{
				echo "Can't fetch the records";
			}

			echo '<table align="center" width = "80%"><tr><th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Check to Add</th></tr>';
			while ($results =$stmt->fetch()){

			$id=$results['id'];
			$name=$results['name'];
			$password=$results['password'];
			$address=$results['tempaddress'];
			$email=$results['email'];
			$phone=$results['phoneno'];
			//$img=$results['img'];
			?>
			<div class="form-group">
				
			<?php
					echo '<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$address.'</td><td>'.$email.'</td><td>'.$phone.'</td><td><input type="checkbox" name="check_list[]" value='.$id.'></td></tr>';
			?>
			</div>
		<?php } ?>
			<div class="form-group">
			<center><button class=".btn-important" type="submit">Add Selected Users</button></center>
			</div>
		</form>
		</div>
		
	</div>
<?php		}
	}
include_once("common/close.php");
?>