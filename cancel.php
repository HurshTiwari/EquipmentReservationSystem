<?php
include_once('/inc/core.inc.php');
if(isset($_SESSION['user_id'])&&isset($_SESSION['username'])){
$userid=$_SESSION['user_id'];
$type=$_SESSION['usertype'];
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
$flag=0;
foreach($_POST['check_list'] as $selected){
		echo $selected."</br>";
		if($type=="user")
		$sql="DELETE FROM `bookings` WHERE `id`= :in and `userid`=:user";
		elseif($type=="admin")
		$sql="DELETE FROM `adminbookings` WHERE `id`= :in and `userid`=:user";
		
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':in',$selected,PDO::PARAM_INT);
		$stmt->bindParam(':user',$userid,PDO::PARAM_INT);
		$result=$stmt->execute();
		if(!$result)
			{$flag=1;}
		$stmt->closeCursor();
	}

		if($flag==1)
		echo"Error! Deletion was not done successfully";
		else
		{
			$db=null;
			echo"Deletion done successfully";
			header("Location: cancelbookings.php");
		}
	}
	else
	header("Location: cancelbooking.php");
}
else
	header("Location: login.php");
?>