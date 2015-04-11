<!DOCTYPE php>
<?php
require_once '/inc/core.inc.php';
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   $flag=0;
	if(isset($_POST['ename'])&&!empty($_POST['ename'])&&isset($_POST['description'])&&!empty($_POST['description']))
	{
		//temporary solution for image problem permanent in next iteration`
		
		
		function GetImageExtension($imagetype)
    {
      if(empty($imagetype)) return false;

       switch($imagetype)
    {

           case 'image/bmp': return '.bmp';

           case 'image/gif': return '.gif';

           case 'image/jpeg': return '.jpg';

           case 'image/png': return '.png';

           default: return false;

       }

     }
 
		$sql = "SELECT max(`id`) AS maxid FROM `equipments`";
        $stmt=$db->prepare($sql);
		$result=$stmt->execute();
		if(!$result)
			$flag=3;
		$result_name=$stmt->fetch();

		
		if (!empty($_FILES["uploadedimage"]["name"])) {

     $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);
    $var= $result_name[0] + 1;
    $imagename=$var.$ext;
    $target_path = "img/equip/".$imagename;


if(move_uploaded_file($temp_name, $target_path)) {
        
		$name=$_POST['ename'];
		$desc=$_POST['description'];
		
		$sql2="INSERT INTO equipments (name,description,image) VALUES (:name,:description,:image)";
		$stmt2=$db->prepare($sql2); 
		$result2=$stmt2->execute(array(':name'=>$name,':description'=>$desc,':image'=>$target_path));
		if($result2)	
			$flag=1;
		else
			$flag=2;
}
else{
   echo'<script>
   alert("Error While uploading image on the server");
   </script>';
   }
}
		
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
				<form method="POST" action="addequipment.php" enctype="multipart/form-data">
  					<div class="form-group">

    					<label for="ename">Equipment Name</label>

    					<input type="text" class="form-control" name="ename">
  					</div>
  					<div class="form-group">
    					<label for="description">Equipment Description</label>
    					<input class="form-control" rows="3" name="description"></input>
  					</div>
					<div class="form-group">
    					<label for="exampleInputFile"></label>
						Upload Image<br><br>
    					<input name="uploadedimage" id="uploadedimage" type="file">
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