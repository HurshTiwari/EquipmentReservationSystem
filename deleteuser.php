<?php
include_once('/inc/connect.inc.php');
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
$flag=0;
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
		$sql="DELETE FROM `users` WHERE `id`= :in";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':in',$selected,PDO::PARAM_INT);
		$result=$stmt->execute();
			if(!$result2){$flag=1;}
			else
			$stmt->closeCursor();
	}

if($flag==1)
echo"Error! Deletion was not done successfully";
else
{$db=null;
echo"Deletion done successfully";}
header("Location: allusers.php");

}
else
	header("Location: cancelbooking.php");
?>