<?php

require '/inc/core.inc.php';
require '/inc/connect.inc.php';  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
    $user_id=$_SESSION['user_id'];
	
	if(isset($_POST['name'])&&!empty($_POST['name'])){
	$name=$_POST['name'];
	$id=$user_id['id'];
	 if($_POST['name']!=$user_id['name']){
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
				
				 <form method="POST" action="settings.php">
	  				<div class="form-group">
    					<label for="username">Username</label>
						<input name="name" value="<?php echo $user_id['name'];?>"></input>
						<button type="submit">EDIT</button>
							
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="password">Password</label>
						<input name="password" value="<?php echo $user_id['password'];?>"></input>
						<button type="submit">EDIT</button>

  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="exampleInputEmail1">Email address</label>
						<input name="email" value="<?php echo $user_id['email'];?>" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="tempaddress">Temporary address</label>
						<input name="tempadd" value="<?php echo $user_id['tempaddress'];?>" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="peraddress">Permanent address</label>
						<input name="peradd" value="<?php echo $user_id['peraddress'];?>" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
					<div class="form-group">
    					<label for="peraddress">Ph No</label>
						<input name="phoneno" value="<?php echo $user_id['phoneno'];?>" ></input>
						<button type="submit">EDIT</button>
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
					<div class="form-group">
    					<label for="peraddress">Roll No</label>
						<input name="rollno" value="<?php echo $user_id['rollno'];?>" ></input>
						<button type="submit">EDIT</button>
    	
  					</div>
					</form>
  					<!--<div class="form-group">
    					<label for="exampleInputFile">Change Photo</label>
    					<input type="file" id="exampleInputFile">
    					<p class="help-block">Browse a photo from your files.</p>
  					</div>-->
  	             
				         
				<!--edit button functions-->
				<?php
				/* function fun1()
				 {
				   $_SESSION['edit_name']=$user_id['name'];
				   header('Location:settings.php');
				 }
				 if($_GET['button1']){fun1();}*/
				?>
       <!-- /#page-wrapper -->

         </div>
            <!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->';

<?php    include_once("/common/close.php");
}
	
else{
  include 'login.php';  
}
?>