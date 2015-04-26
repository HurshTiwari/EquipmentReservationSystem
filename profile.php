<?php

require 'inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
    $user_id=$_SESSION['user_id'];
	
	 

	echo "hello!!";
    $user_id=$_SESSION['user_id'];

	include_once("common/head.php");

       include_once("common/navbar_top_side.php");?>       

          <div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i>My Profile
                        </h1>
                    </div>
                </div>
	
			  <!--form-->
				
				<form method="POST" action="settings.php" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="exampleInputFile"></label>
						<img src="<?php echo $user_id['photo']; ?>" width="200" height="200"><br>
						<br><br>
  					</div>
  	                </form>
				<br><br>
				 <form class="form" method="POST" action="settings.php" id="name_form">
	  				<div class="form-group">
    					<label for="username">Username</label>
						<input name="name" id="username" value="<?php echo $user_id['name'];?>" disabled></input>
							
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="password">Password</label>
						<input name="password" type="password" value="<?php echo $user_id['password'];?>" disabled></input>
						

  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="email">Email address</label>
						<input name="email" value="<?php echo $user_id['email'];?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="tempaddress">Temporary address</label>
						<input name="tempadd" value="<?php echo $user_id['tempaddress'];?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
  					<div class="form-group">
    					<label for="peraddress">Permanent address</label>
						<input name="peradd" value="<?php echo $user_id['peraddress'];?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
					<div class="form-group">
    					<label for="peraddress">Ph No</label>
						<input name="phoneno" value="<?php echo $user_id['phoneno'];?>" disabled></input>
						
    					
  					</div>
					</form>
					<form method="POST" action="settings.php">
					<div class="form-group">
    					<label for="peraddress">Roll No</label>
						<input name="rollno" value="<?php echo $user_id['rollno'];?>" disabled></input>
						
    	
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