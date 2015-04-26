<?php

require_once 'inc/core.inc.php';if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   
	include_once("common/head.php");
       include_once("common/navbar_top_side.php");?>
       

          <div id="page-wrapper">
			<div class="container">
				<!-- Page Heading -->
                
				
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <center>Edit Equipment</center>
                        </h1>
                        <ul class="alert alert-success alert-dismissable">
                            <li>
                                <i class="fa fa-tag"></i> Click at the images below to edit the respective equipment 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
       <?php 
	   include_once("inc/class.editequipment.inc.php");
		$equipment= new equipment($db);
		$equipment->display();
		$equipment->close();
		?>

         </div>
            <!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->';

<?php    include_once("common/close.php");
}
	
else{
	  header('Location:login.php');  
}
?>