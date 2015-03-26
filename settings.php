<?php

require '/inc/core.inc.php';
require '/inc/connect.inc.php';  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{    echo "hello!!";
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
				<form>
	  				<div class="form-group">
    					<label for="username">Username</label>
						<?php echo $user_id['name'];?><a href="editname.php">EDIT</a>
							
  					</div>
  					<div class="form-group">
    					<label for="password">Password</label>
    					<?php echo $user_id['password'];?><button>EDIT</button>
  					</div>
  					<div class="form-group">
    					<label for="exampleInputEmail1">Email address</label>
    					<?php echo $user_id['email'];?><button>EDIT</button>
  					</div>
  					<div class="form-group">
    					<label for="tempaddress">Temporary address</label>
    					<?php echo $user_id['tempaddress'];?><button>EDIT</button>
  					</div>
  					<div class="form-group">
    					<label for="peraddress">Permanent address</label>
    					<?php echo $user_id['peraddress'];?><button>EDIT</button>
  					</div>
					<div class="form-group">
    					<label for="peraddress">Ph No</label>
    					<?php echo $user_id['phoneno'];?><button>EDIT</button>
  					</div>
					<div class="form-group">
    					<label for="peraddress">Roll No</label>
    					<?php echo $user_id['rollno'];?><button>EDIT</button>
  					</div>
  					<div class="form-group">
    					<label for="exampleInputFile">Change Photo</label>
    					<input type="file" id="exampleInputFile">
    					<p class="help-block">Browse a photo from your files.</p>
  					</div>
  	             
				</form>          
				<!--edit button functions-->
				<?php
				/* function fun1()
				 {
				   $_SESSION['edit_name']=$user_id['name'];
				   header('Location:edit.php');
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