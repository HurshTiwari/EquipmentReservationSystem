<?php

require '/inc/core.inc.php';
  

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{   
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
                            <i class="fa fa-fw fa-user"></i>Search Results
                        </h1>
                    </div>
                </div>
<?php

if(isset($_SESSION['search_equip'])&&!empty($_SESSION['search_equip'])){
     $search_equip=$_SESSION['search_equip'];
	 $stmt1 = $db->prepare("SELECT * FROM equipments WHERE name like ?");
	 $result=$stmt1->execute(array('%'.$search_equip.'%'));
	 if($result){
	   $i=0;
	   while($row = $stmt1->fetch()){
				$eid=$row['id'];
				$name=$row['name'];
				$img=$row['image'];
				$desc=$row['description'];
				if($i%3==0)
				{
				echo '<div class="row">';
				}
				
				echo
						'<form role="form" action="test.php" method="post"><div class="col-sm-6 col-md-4">'
							.'<a>'
							.'<input type="image" id="img" name ="img" class="img-responsive" src="'.$img.'" alt="Sorry! Can\'t load the image ">'
							.'<h3>'.$name.'</h3>'
							.'<p>'
							.'Description........................ '.$desc
							.'</p>'
							.'<input id="img_t" name="img_t" type="hidden" value="'.$img.'">'
							.'<input id="desc" name="desc" type="hidden" value="'.$desc.'">'
							.'<input id="ename" name="ename" type="hidden" value="'.$name.'">'
							.'<input id="eid" name="eid" type="hidden" value="'.$eid.'">'
						.'</a></form></div>';
				if(($i+1)%3==0)
				{
				echo "</div>";
				}
			
				$i++;
			}
	   }
	   else{
	      echo'<script>alert("result not obtained for the query stmt1 !!");</script>';
	   }
	   unset($_SESSION['search_equip']);
 }
 else{
  header('Location:index.php');
 }

?>					
					
				        
         </div>
            <!-- /.container-fluid -->
			
			</div>
			
			
        <!-- /#page-wrapper -->

<?php    include_once("/common/close.php");

	}
else{
  include 'index.php';  
}
?>