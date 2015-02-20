<?php
include_once("common/base.php"); 
$pagetitle="addaccount";
include_once("common/head.php"); 
include_once("common/navbar_top_side.php"); 
?>
<div id="page-wrapper">
<div class="container huge">
<div class="row">
<?php
	$sql="SELECT * from addusers";
	try{$stmt=$db->query($sql);} 
	catch(PDOException $e) {echo "<div>ERROR: ".$e->getMessage()."</div>";}	
?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>Name</th>
		<th>Roll No.</th>
	</tr>
	</thead>
	<tbody>
<?php
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<br /><tr><td>".$row['name']."</td><td>".$row['rollno']."</td></tr>";
            }



?>
	</tbody>

</table>
</div>
</div>
</div>
<?php
include_once("common/close.php"); 
?>

