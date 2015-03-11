<!DOCTYPE php>
<?php include_once("/common/base.php");?>
<?php include_once("/common/head.php");?>
<?php include_once("/common/navbar_top_side.php");?>
            <div id="page-wrapper">
			<div class="container">
				<!-- Page Heading -->
                
				
				<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <center>Equipments</center>
                        </h1>
                        <ul class="alert alert-success alert-dismissable">
                            <li>
                                <i class="fa fa-tag"></i> Click at the links below to get the ful description of the equipment 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								&times;
								</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
<?php include_once("/inc/class.equipment.inc.php");
		$equipment= new equipment($db);
		$equipment->display();

?>
            </div>
            <!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->

    <?php include_once("/common/close.php")?>