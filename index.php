<?php

require_once '/inc/core.inc.php';


if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   $userid=$_SESSION['user_id']['id'];
	$type=$_SESSION['usertype'];
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($type=="admin")
		{$sql="select * from `adminbookings` where unix_timestamp(`starttime`)< unix_timestamp(now()) and unix_timestamp(`endtime`)>unix_timestamp(now()) and userid= :userid";}
		elseif($type=="user")
		{$sql="select * from `bookings` where unix_timestamp(`starttime`)< unix_timestamp(now()) and unix_timestamp(`endtime`)>unix_timestamp(now()) and userid= :userid" ;}
		$stmt=$db->prepare($sql);
		$stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
		
		try{$stmt->execute();}catch(PDOException $e){
			
			echo "<script type='text/javascript'>alert(".$e->getMessage().")</script>";
			}
		$result=$stmt->fetch();
		$stmt->closeCursor();	
		
		
	
	include_once("/common/head.php");
	include_once("/common/navbar_top_side.php");
	   $show=0;//have to set it to zero.
		if($result)
			{
				if($result['status']=0)
				$show=1;
			}
			
		if (isset($_POST['status'])&&!empty($_POST['status']))
			{
			$status=$_POST['status'];
			
				if($type=="admin")
				{
						if($status==1)
						{
							$sql="UPDATE `adminbookings` SET `status` = 1 where id= :id ";
							$stmt=$db->prepare($sql);
							$stmt->bindParam(':id',$result['id'],PDO::PARAM_INT);
					
							try{$stmt->execute();}catch(PDOException $e){
								echo "<script>alert('error update not successful".$e->getMessage()."');</script>";
								exit;
								}
							$result=$stmt->rowCount();
							$stmt->closeCursor();
						}
						elseif($status==2)
						{
							$sql="UPDATE `adminbookings` SET `status` = 2 where id= :id ";
							$stmt=$db->prepare($sql);
							$stmt->bindParam(':id',$result['id'],PDO::PARAM_INT);
					
							try{$stmt->execute();}catch(PDOException $e){
								echo "<script>alert('error update not successful".$e->getMessage()."');</script>";
								exit;
								}
							$result=$stmt->rowCount();
							$stmt->closeCursor();
						}
						
				}
				
				elseif($type=="user"){
						if($status==1)
						{
							$sql="UPDATE `bookings` SET `status` = 1 where id= :id ";
							$stmt=$db->prepare($sql);
							$stmt->bindParam(':id',$result['id'],PDO::PARAM_INT);
					
							try{$stmt->execute();}catch(PDOException $e){
								echo "<script>alert('error update not successful".$e->getMessage()."');</script>";
								exit;
								}
							$result=$stmt->rowCount();
							
							$stmt->closeCursor();
						}
						elseif($status==2)
						{
							$sql="UPDATE `bookings` SET `status` = 2 where id= :id ";
							$stmt=$db->prepare($sql);
							$stmt->bindParam(':id',$result['id'],PDO::PARAM_INT);
					
							try{$stmt->execute();}catch(PDOException $e){
								echo "<script>alert('error update not successful".$e->getMessage()."');</script>";
								exit;
								}
							$result=$stmt->rowCount();
							$stmt->closeCursor();
						}
					}
			
			
			$show=0;
			}  
?>
       

          <div id="page-wrapper">
			<div class="container">
				<!-- Page Heading -->
                
				
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <center>Equipments</center>
                        </h1>
                        <ul class="alert alert-success alert-dismissable">
                            <li>
                                <i class="fa fa-tag"></i> Click at the links below to get the ful description of the equipment 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
                            </li>
                        </ul>
                    </div>
                </div>
				<?php if($show==1){?>
				<div class="row">
					<ul class="alert alert-success alert-dismissable">
                            <li>
								<form class="form form-inline" method="POST" action="index.php">
								<label for="status">Are you using your booked equipment right now?</label>
								<select id="status" name="status">
									<option value="1">Yes</option>
									<option value="2">No</option>
								</select>
								<button type="submit">
								Confirm
								</button>
								</form>
                            </li>
                        </ul>
				</div>
				<?php }?>
                <!-- /.row -->
       <?php 
	   include_once("/inc/class.equipment.inc.php");
		$equipment= new equipment($db);
		$equipment->display();
		$equipment->close();
		?>

         </div>
            <!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->';

<?php    include_once("/common/close.php");
}
	
else{
	  header('Location:login.php');  
}
?>