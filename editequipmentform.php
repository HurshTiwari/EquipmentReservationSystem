<!DOCTYPE php>
<?php include_once("inc/core.inc.php");
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
	
	//function to get image extension
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
	
	
	if(isset($_POST['equip_name'])&&!empty($_POST['equip_name'])){
	$equip_name=$_POST['equip_name'];
	$eid=$_SESSION['eid'];
				
				
				$sql = "update equipments set name=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($equip_name,$eid));
				  $_SESSION['ename']=$equip_name;
		}
	
	if(isset($_POST['equip_desc'])&&!empty($_POST['equip_desc'])){
	$equip_desc=$_POST['equip_desc'];
	$eid=$_SESSION['eid'];
				
				
				$sql = "update equipments set description=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($equip_desc,$eid));
				  $_SESSION['desc']=$equip_desc;
		}

	
//if(isset($_POST['eid']))	
	//{$_SESSION['eid']=$_POST['eid'];}
//if(isset($_POST['img']))	
//{$_SESSION['img']=$_POST['img'];}
if(!isset($_POST['ename']))
	$ename=$_SESSION['ename'];
else
	{
	$ename=$_POST['ename'];
	$_SESSION['ename']=$ename;
	}
if(!isset($_POST['img_t']))
	$img_t=$_SESSION['img_t'];
else
	{
	$img_t=$_POST['img_t'];
	$_SESSION['img_t']=$img_t;
	}
if(!isset($_POST['eid']))
	$eid=$_SESSION['eid'];
else
	{
	$eid=$_POST['eid'];
	$_SESSION['eid']=$eid;
	}
if(!isset($_POST['desc']))
	$desc=$_SESSION['desc'];
else
	{
	$desc=$_POST['desc'];
	$_SESSION['desc']=$desc;
	}
	
	if (!empty($_FILES["uploadedimage"]["name"])) {

     $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);
    $eid=$_SESSION['eid'];
    $imagename=$eid.$ext;
    $target_path = "img/equip/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

				$sql = "update equipments set image=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($target_path,$eid));
				  $img_t=$target_path;
				  $_SESSION['img_t']=$target_path;
}
else{
   echo'<script>
   alert("Error While uploading image on the server");
   </script>';
   }
}
	
	
	
	
	
	include_once("common/head.php");
include_once("common/navbar_top_side.php");
?>
		<div id="page-wrapper">
		<div class="container-fluid">
		<!-- Page Heading -->
		                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i>Edit <?php echo $ename ?> 
                        </h1>
                    </div>
                </div>		
				
			<!--form-->
			    <!--Display Image-->
				 <form method="POST" action="editequipmentform.php" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="exampleInputFile"></label>
						<img src="<?php echo $img_t; ?>" width="600" height="400"><br>
						Wanna Edit??<br><br>
    					<input name="uploadedimage" id="uploadedimage" type="file">
			            <button type="submit">EDIT</button>
  					</div>
  	                </form>
				 <br><br>
				 <form class="form" method="POST" action="editequipmentform.php" id="name_form" name="name_form">
	  				<div class="form-group">
    					<label for="equip_name">Equipment Name</label>
						<input name="equip_name" id="equip_name" value="<?php echo $ename;?>"></input>
						<button type="submit">EDIT</button>
							
  					</div>
					</form>
				
				<form class="form" method="POST" action="editequipmentform.php" id="desc_form" name ="desc_form">
	  				<div class="form-group">
    					<label for="equip_desc">Equipment Description</label>
						<input name="equip_desc" id="equip_desc" value="<?php echo $desc;?>"></input>
						<button type="submit">EDIT</button>
							
  					</div>
					</form>
			</div>
				<!-- /.container-fluid -->
		</div>
     <script src="js/jquery.validate.js"></script>	
	 <script type="text/javascript">
	 $(document).ready(function(){
	 $('#name_form').validate({
	    rules: {
		 equip_name: {
	        minlength: 5,
			maxlength: 75,
	        required: true
	      }
	    },
		messages: {
		 equip_name: {
	        minlength: "Please enter minimum 5 letter",
			maxlength: "Maximium 75 letters allowed"
	      }
		  
	    },
		highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });
	  
	  $('#desc_form').validate({
	    rules: {
		 equip_desc: {
	        minlength: 15,
			maxlength: 2000,
	        required: true
	      }
	    },
		messages: {
		 equip_desc: {
	        minlength: "Please enter minimum 15 letter",
			maxlength: "Maximium 2000 letters allowed"
	      }
		  
	    },
		highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });


	 });
	 </script>
			

<?php include_once("common/close.php");
}else 
{
header ('Location:login.php');
}

?>