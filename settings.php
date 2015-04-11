<?php

require '/inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
    $user_id=$_SESSION['user_id'];
	
	
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
$id=$user_id['id'];
 if (!empty($_FILES["uploadedimage"]["name"])) {

     $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);

    $imagename=$id.$ext;

	if($_SESSION['usertype']=="admin")
    $target_path = "img/admin/".$imagename;
	else if($_SESSION['usertype']=="user")
	$target_path = "img/user/".$imagename;

if(move_uploaded_file($temp_name, $target_path)) {


                if($_SESSION['usertype']=="admin")
				$sql = "update admin set photo=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set photo=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($target_path,$id));
				  $user_id['photo']=$target_path;
				  $_SESSION['user_id']['photo']=$target_path;
}
else{
   echo'<script>
   alert("Error While uploading image on the server");
   </script>';
   }
}
	
	
	
	if(isset($_POST['username'])&&!empty($_POST['username'])){
	$name=$_POST['username'];
	$id=$user_id['id'];
	 if($_POST['username']!=$user_id['username']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set name=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set name=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($name,$id));
				  $user_id['name']=$name;
				  $_SESSION['user_id']['name']=$name;
		}
	}
	 if(isset($_POST['password'])&&!empty($_POST['password'])){
	$password=$_POST['password'];
	$id=$user_id['id'];
	 if($_POST['password']!=$user_id['password']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set password=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set password=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($password,$id));
				  $user_id['password']=$password;
				  $_SESSION['user_id']['password']=$password;
		}
	}
	 if(isset($_POST['email'])&&!empty($_POST['email'])){
	$email=$_POST['email'];
	$id=$user_id['id'];
	 if($_POST['email']!=$user_id['email']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set email=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set email=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($email,$id));
				  $user_id['email']=$email;
				  $_SESSION['user_id']['email']=$email;
		}
	}
	 if(isset($_POST['phoneno'])&&!empty($_POST['phoneno'])){
	$phoneno=$_POST['phoneno'];
	$id=$user_id['id'];
	 if($_POST['phoneno']!=$user_id['phoneno']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set phoneno=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set phoneno=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($phoneno,$id));
				  $user_id['phoneno']=$phoneno;
				  $_SESSION['user_id']['phoneno']=$phoneno;
		}
	}
	 if(isset($_POST['tempadd'])&&!empty($_POST['tempadd'])){
	$tempadd=$_POST['tempadd'];
	$id=$user_id['id'];
	 if($_POST['tempadd']!=$user_id['tempaddress']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set tempaddress=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set tempaddress=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($tempadd,$id));
				  $user_id['tempaddress']=$tempadd;
				  $_SESSION['user_id']['tempaddress']=$tempadd;
		}
	}
	 if(isset($_POST['peradd'])&&!empty($_POST['peradd'])){
	$peradd=$_POST['peradd'];
	$id=$user_id['id'];
	 if($_POST['peradd']!=$user_id['peraddress']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set peraddress=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set peraddress=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($peradd,$id));
				  $user_id['peraddress']=$peradd;
				  $_SESSION['user_id']['peraddress']=$peradd;
		}
	 }
	 if(isset($_POST['rollno'])&&!empty($_POST['rollno'])){
	$rollno=$_POST['rollno'];
	$id=$user_id['id'];
	 if($_POST['rollno']!=$user_id['rollno']){
				if($_SESSION['usertype']=="admin")
				$sql = "update admin set rollno=? where id=?";
				elseif($_SESSION['usertype']=="user")
				$sql = "update users set rollno=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($rollno,$id));
				  $user_id['rollno']=$rollno;
				  $_SESSION['user_id']['rollno']=$rollno;
	 }
}	 

	echo "hello!!";
    $user_id=$_SESSION['user_id'];

	include_once("/common/head.php");

       include_once("/common/navbar_top_side.php");
?>       

          <div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i> General Account Settings
                        </h1>
                    </div>
                </div>
	
			  <!--form-->
				
				<form method="POST" action="settings.php" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="exampleInputFile"></label>
						<img src="<?php echo $user_id['photo']; ?>" width="200" height="200"><br>
						Wanna Edit??<br><br>
    					<input name="uploadedimage" id="uploadedimage" type="file">
			            <button type="submit">EDIT</button>
  					</div>
  	                </form>
				<br><br>
				 <form class="form" method="POST" action="settings.php" id="name_form" name="name_form">
	  				<div class="form-group">
    					<label for="username">Username</label>
						<input name="username" id="username" type="text" value="<?php echo $user_id['name'];?>"></input>
						<button type="submit">EDIT</button>
							
  					</div>
					</form>
					<form method="POST" action="settings.php" id="password_form" name="password_form">
  					<div class="form-group">
    					<label for="password">Password</label>
						<input name="password" id="password" type="password" value="<?php echo $user_id['password'];?>"></input>
						<button type="submit">EDIT</button>

  					</div>
					</form>
					<form method="POST" action="settings.php" id="email_form" name="email_form">
  					<div class="form-group">
    					<label for="email">Email address</label>
						<input name="email" id="email" value="<?php echo $user_id['email'];?>" type="text" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php" id="tempadd_form" name="tempadd_form">
  					<div class="form-group">
    					<label for="tempaddress">Temporary address</label>
						<input name="tempadd" id="tempadd" value="<?php echo $user_id['tempaddress'];?>" type="text" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php" id="peradd_form" name="peradd_form">
  					<div class="form-group">
    					<label for="peraddress">Permanent address</label>
						<input name="peradd" id="peradd" value="<?php echo $user_id['peraddress'];?>" type="text" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php" id="phone_form" name="phone_form">
					<div class="form-group">
    					<label for="phoneno">Ph No</label>
						<input name="phoneno" id="phoneno" value="<?php echo $user_id['phoneno'];?>" type="text"></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php" id="roll_form" name="roll_form">
					<div class="form-group">
    					<label for="rollno">Roll No</label>
						<input name="rollno" id="rollno" value="<?php echo $user_id['rollno'];?>" ></input>
						<button type="submit">EDIT</button>
    	
  					</div>
					</form>
					
					
				        
			</div>
            <!-- /.container-fluid -->
			
	</div>
	<!-- /#page-wrapper -->';
<script src="js/jquery.validate.js"></script>	
<script src="js/settingscript.js"></script>
			
      

<?php    include_once("/common/close.php");
}
	
else{
  include 'login.php';  
}
?>