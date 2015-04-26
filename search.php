<?php

require 'inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  
    $user_id=$_SESSION['user_id'];

    if(isset($_POST['search_equip'])&&!empty($_POST['search_equip'])){
	 $search_equip=$_POST['search_equip'];
	 $stmt = $db->prepare("SELECT count(*) FROM equipments WHERE name like ?");
	 $result=$stmt->execute(array('%'.$search_equip.'%'));
	 $count=$stmt->fetch();
	 if($count[0]==0){
	  echo'<script>alert("No results found!!");</script>';
	 }
	 else{
	  $_SESSION['search_equip']=$search_equip;
	  unset($_SESSION['search_user']);
	  header('Location:searchresult.php');
	 }
   }

   
   if(isset($_POST['search_user'])&&!empty($_POST['search_user'])){
	 $search_user=$_POST['search_user'];
	 $stmt = $db->prepare("SELECT count(*) FROM users WHERE name like ?");
	 $result=$stmt->execute(array('%'.$search_user.'%'));
	 $count=$stmt->fetch();
	 if($count[0]==0){
	  echo'<script>alert("No results found!!");</script>';
	 }
	 else{
	  $_SESSION['search_user']=$search_user;
	  unset($_SESSION['search_equip']);
	  header('Location:searchresult.php');
	 }
   }
    

	include_once("common/head.php");

       include_once("common/navbar_top_side.php");?>       

          <div id="page-wrapper">
			<div class="container">
				 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-user"></i>Search
                        </h1>
                    </div>
                </div>
	
			  <!--form-->
				    <form class="form" method="POST" action="search.php" id="search_equip_f">
	  				<div class="form-group">
    					<label for="search_equip">By Equipment</label>
						<input name="search_equip" id="search_equip"></input>
						<button type="submit">Search</button>	
  					</div>
					</form>
					
					<form class="form" method="POST" action="search.php" id="search_user_f">
	  				<div class="form-group">
    					<label for="search_user">By User</label>
						<input name="search_user" id="search_user"></input>
						<button type="submit">Search</button>	
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