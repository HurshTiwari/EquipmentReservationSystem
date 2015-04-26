<?php
include_once('inc/connect.inc.php');
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
$flag=0;
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
		$sql="SELECT * FROM `addusers` WHERE `id`= :in";
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':in',$selected,PDO::PARAM_INT);
		$result=$stmt->execute();
		if(!$result)
			{$flag=1;}
		else
			{
			$row=$stmt->fetch();
			$sql2="INSERT INTO `users`(`name`, `password`, `email`, `photo`, `tempaddress`, `peraddress`, `phoneno`, `rollno`) VALUES (:name,:pass,:email,:photo,:tempaddress,:peraddress,:phone,:roll)";
			$stmt2=$db->prepare($sql2);
			$stmt2->bindParam(':name',$row['name'],PDO::PARAM_STR);
			$stmt2->bindParam(':pass',$row['password'],PDO::PARAM_STR);
			$stmt2->bindParam(':email',$row['email'],PDO::PARAM_STR);
			$stmt2->bindParam(':photo',$row['photo'],PDO::PARAM_STR);
			$stmt2->bindParam(':tempaddress',$row['tempaddress'],PDO::PARAM_STR);
			$stmt2->bindParam(':peraddress',$row['peraddress'],PDO::PARAM_STR);
			$stmt2->bindParam(':phone',$row['phoneno'],PDO::PARAM_STR);
			$stmt2->bindParam(':roll',$row['rollno'],PDO::PARAM_STR);
			$result2=$stmt2->execute();	
			if(!$result2)
				$flag=2;
			else{
				$stmt2->closeCursor();
				$sql3="DELETE FROM `addusers` WHERE name= :name";
				$stmt3=$db->prepare($sql3);
				$stmt3->bindParam(':name',$row['name'],PDO::PARAM_STR);
				$result3=$stmt3->execute();
					if(!$result2){$flag=2;}
					else
					$stmt3->closeCursor();
				}
			}
		$stmt->closeCursor();
	}

if($flag==1)
echo"Error! Selection was not done successfully";
elseif($flag==2)
echo"Error! Insertion was not done successfully";
elseif($flag==3)
echo"Error! Deletion was not done successfully";
else
{$db=null;
echo"Insertion done successfully";}
header("Location: allusers.php");

}
else
	header("Location: cancelbooking.php");
?>