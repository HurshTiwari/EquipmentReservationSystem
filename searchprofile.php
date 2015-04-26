<?php

require 'inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
    include_once("common/head.php");
	include_once("common/navbar_top_side.php");
	
if(!isset($_POST['uname']))
	$uname=$_SESSION['uname'];
else
	{
	$uname=$_POST['uname'];
	$_SESSION['uname']=$uname;
	}
if(!isset($_POST['photo_t']))
	$photo_t=$_SESSION['photo_t'];
else
	{
	$photo_t=$_POST['photo_t'];
	$_SESSION['photo_t']=$photo_t;
	}
if(!isset($_POST['rollno']))
	$rollno=$_SESSION['rollno'];
else
	{
	$rollno=$_POST['rollno'];
	$_SESSION['rollno']=$rollno;
	}
if(!isset($_POST['phoneno']))
	$phoneno=$_SESSION['phoneno'];
else
	{
	$phoneno=$_POST['phoneno'];
	$_SESSION['phoneno']=$phoneno;
	}
if(!isset($_POST['peraddress']))
	$peraddress=$_SESSION['peraddress'];
else
	{
	$peraddress=$_POST['peraddress'];
	$_SESSION['peraddress']=$peraddress;
	}
if(!isset($_POST['id']))
	$id=$_SESSION['id'];
else
	{
	$id=$_POST['id'];
	$_SESSION['id']=$id;
	}
if(!isset($_POST['email']))
	$email=$_SESSION['email'];
else
	{
	$email=$_POST['email'];
	$_SESSION['email']=$email;
	}
	
?>       

          <div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i><?php echo $uname?>'s Profile
                        </h1>
                    </div>
                </div>
	
			  <!--form-->
				
				<form method="POST" action="#" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="exampleInputFile"></label>
						<img src="<?php echo $photo_t; ?>" width="200" height="200"><br>
						<br><br>
  					</div>
  	                </form>
				<br><br>
				 <form class="form" method="POST" action="#" id="name_form">
	  				<div class="form-group">
    					<label for="username">Username</label>
						<input name="name" id="username" value="<?php echo $uname;?>" disabled ></input>
							
  					</div>
					</form>
					<form method="POST" action="#">
  					<div class="form-group">
    					<label for="email">Email address</label>
						<input name="email" value="<?php echo $email;?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="#">
  					<div class="form-group">
    					<label for="peraddress">Permanent address</label>
						<input name="peradd" value="<?php echo $peraddress;?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="#">
					<div class="form-group">
    					<label for="peraddress">Ph No</label>
						<input name="phoneno" value="<?php echo $phoneno;?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="#">
					<div class="form-group">
    					<label for="peraddress">Roll No</label>
						<input name="rollno" value="<?php echo $rollno;?>" disabled></input>
						
    	
  					</div>
					</form>
					
					
				        
         </div>
            <!-- /.container-fluid -->
			
			</div>
			
			
        <!-- /#page-wrapper -->

<?php    include_once("common/close.php");

	}
else{
  include 'login.php';  
}
?>