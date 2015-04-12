<?php

require '/inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_id=$_SESSION['user_id'];
	
	$id=$_GET['id'];
	$eid=$_GET['eid'];
	$type=$_GET['type'];
	$stime=$_GET['starttime'];

	if($type=='user')
	{
	$sql="Select * from `users` where id= :id limit 1";
	}
	elseif($type=='admin')
	{$sql="Select * from `admin` where id= :id limit 1";}
	
	$stmt=$db->prepare($sql);
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	try{$stmt->execute();}catch(PDOException $e){
			echo "error query not executed".$e->getMessage()."\n";
			exit;
			}
	$result=$stmt->fetch();
	$stmt->closeCursor();	
	
	if($type=='user')
	{$sql2="Select * from `bookings` where userid= :id and eid= :eid and unix_timestamp(`starttime`)= :stime limit 1";}
	elseif($type=='admin')
	{$sql2="Select * from `adminbookings` where userid= :id and eid= :eid and unix_timestamp(`starttime`)= :stime limit 1";}
	
	$stmt2=$db->prepare($sql2);
	$stmt2->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt2->bindParam(':eid',$eid,PDO::PARAM_INT);
	$stmt2->bindParam(':stime',$stime,PDO::PARAM_INT);
	try{$stmt2->execute();}catch(PDOException $e){
			echo "error query 2 not executed".$e->getMessage()."\n";
			exit;
			}
		
	$result2=$stmt2->fetch();
	$stmt2->closeCursor();
	
	
	$sql3="Select name from equipments where id= :eid";
	$stmt3=$db->prepare($sql3);
	$stmt3->bindParam(':eid',$eid,PDO::PARAM_INT);
	try{$stmt3->execute();}catch(PDOException $e){
			echo "error query 3 not executed".$e->getMessage()."\n";
			exit;
			}
		
	$result3=$stmt3->fetch();
	$ename=$result3['name'];
	$stmt3->closeCursor();
	
	
	
	
	include_once("/common/head.php");
       include_once("/common/navbar_top_side.php");
?>       

          <div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i>Booker Profile
                        </h1>
                    </div>
                </div>
	
			  <!--form-->
				
				<form>
  					<div class="form-group">
    					<label for="exampleInputFile"></label>
						<img src="<?php echo $result['photo']; ?>" width="200" height="200"><br>
						<br><br>
  					</div>
  	                </form>
				<br><br>
				 <form class="form">
	  				<div class="form-group">
    					<label for="username">Username</label>
						<input name="name" id="username" value="<?php echo $result['name'];?>"readonly></input>
							
  					</div>
					</form>
					<form method="POST" action="">
  					<div class="form-group">
    					<label for="email">Email address</label>
						<input name="email" value="<?php echo $result['email'];?>" readonly></input>
  					</div>
					</form>
					<form>
  					<div class="form-group">
    					<label for="tempadd">Temporary address</label>
						<input name="tempadd" id="tempadd" value="<?php echo $result['tempaddress'];?>" readonly></input>
  					</div>
					</form>
					<form>
					<div class="form-group">
    					<label for="phoneno">Ph No</label>
						<input name="phoneno" id="phoneno" value="<?php echo $user_id['phoneno'];?>" readonly></input>
  					</div>
					</form>
					
					<div class="row">
						<h1>Booking Details :</h1>
						<form>
						<div class="form-group">
    					<label for="ename">Equipment Name</label>
						<input name="ename" id="ename" value="<?php echo $ename;?>" readonly></input>
						</div>
						</form>
						<form>
						<div class="form-group">
    					<label for="starttime">Start Date And Time</label>
						<input name="starttime" id="starttime" value="<?php echo $result2['starttime'];?>" readonly></input>
						</div>
						</form>
						<form>
						<div class="form-group">
    					<label for="endtime">End Date And Time</label>
						<input name="endtime" id="endtime" value="<?php echo $result2['endtime'];?>" readonly></input>
						</div>
						</form>
					</div>
				        
         </div>
            <!-- /.container-fluid -->
			
			</div>
			
			
        <!-- /#page-wrapper -->

<?php    include_once("/common/close.php");

	}
else{
  include 'login.php';  
}
?>