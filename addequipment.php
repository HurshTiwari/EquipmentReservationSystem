<!DOCTYPE php>
<?php
require_once '/inc/core.inc.php';
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   $flag=0;
	if(isset($_POST['ename'])&&!empty($_POST['ename'])&&isset($_POST['description'])&&!empty($_POST['description']))
	{
		//temporary solution for image problem permanent in next iteration`
		
		$sql = "SELECT max(`id`) AS maxid FROM `equipments`";
        $stmt=$db->prepare($sql);
		$result=$stmt->execute();
		if(!$result)
			$flag=3;
		$result_name=$stmt->fetch();	
		$img="/img/equip/".($result_name[0]+1).".jpg";
		
		$name=$_POST['ename'];
		$desc=$_POST['description'];
		
		$sql2="INSERT INTO `equipments`( `name`, `description`, `image`) VALUES ?,?,?";
		$stmt2=$db->prepare($sql2); 
		/*$stmt2->bindParam(':name',$name,PDO::PARAM_STR);
		$stmt2->bindParam(':desc',$desc,PDO::PARAM_STR);
		$stmt2->bindParam(':img',$img,PDO::PARAM_STR);*/
		$result2=$stmt2->execute(array($name,$desc,$img));
		if($result2)	
			$flag=1;
		else
			$flag=2;
	}
	include_once("/common/head.php");
    include_once("/common/navbar_top_side.php");
?>

<div id="page-wrapper">
            <div class="container-fluid">
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Equipment
                        </h1>
                    </div>
                </div>
				<?php
					if($flag==1)
					echo '<div class="alert alert-success alert-dismissable"><i class="fa fa-tag"></i> Success! New element added succesfully
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
							</div>';
					elseif($flag==2)
//<<<<<<< HEAD
					echo	'<div class="alert alert-success alert-dismissable"><i class="fa fa-tag"></i>Error! Could not insert 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
							</div>';
					elseif($flag==3)
					echo	'<div class="alert alert-success alert-dismissable"><i class="fa fa-tag"></i> Error! New equipment could not be added because old data was not fetched
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
							</div>';
					
					else		
					echo	'<div class="alert alert-success alert-dismissable"><i class="fa fa-tag"></i> Fill the form
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
							</div>';
				?>
            	<!--form-->
				<form method="POST" action="addequipment.php">
  					<div class="form-group">

    					<label for="ename">Equipment Name</label>

    					<input type="text" class="form-control" name="ename">
  					</div>
  					<div class="form-group">
    					<label for="description">Equipment Description</label>
    					<input class="form-control" rows="3" name="description"></input>
  					</div>
  					<!--<div class="form-group">
    					<label for="exampleInputFile">Equipment's Photo</label>
    					<input type="file" id="exampleInputFile">
    					<p class="help-block">Upload the equipment's phtoto from your files.</p>
  					</div>
					to be done in the next iteration
					-->
  					<button type="submit" class="btn btn-default">Submit</button>
				</form>          
       <!-- /#page-wrapper -->
    </div>
<?php
   include_once("/common/close.php");
	}
	
else{
	 header ('Location:login.php');  
	}
?>