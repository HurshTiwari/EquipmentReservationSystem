<?php

require '/inc/core.inc.php';
require '/inc/connect.inc.php';
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   $user_id=$_SESSION['user_id'];
    $temp=$user_id['id'];
	
	
	if( isset($_POST['new_username'])){
echo "hello";
$n_username=$_POST['new_username'];
				if(!empty($n_username))
				{
				  $name=$n_username;
				  $id=$temp;
				  $sql = "update users set name=? where id=?";
				  $query = $db->prepare($sql);
				  $query->execute(array($name,$id));
				  header('Location:settings.php');	
				  
				}
				else{
						  echo'<html>
				 <script type="text/javascript">
				 alert("Enter a new username!!!" );
				 </script>
				 </html>';
				}
				
	}
	else{
						  echo'<html>
				 <script type="text/javascript">
				 alert("Enter a new username!!!" );
				 </script>
				 </html>';
				}

	include_once("/common/head.php");
       include_once("/common/navbar_top_side.php");




?>

<div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <form action="editname.php" method="POST">
	  				<div class="form-group">
    					<label for="username">New Username</label>
    					<input type="Username" class="form-control" id="new_username" placeholder="Enter the new username">
  					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				 </form>

         </div>
            <!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->';

<?php    include_once("/common/close.php");
}
	
else{
  include 'index.php';  
}
?>