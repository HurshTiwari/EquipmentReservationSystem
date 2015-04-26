<!DOCTYPE php>
<?php include_once("inc/core.inc.php");
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
include_once("common/head.php");
include_once("common/navbar_top_side.php");

?>
		<div id="page-wrapper">
		<div class="container-fluid">
				<!-- Page Heading -->		
				<div class="page-header">	
				<div class="row">
					<center><h1>Complete View</h1></center>
				</div>
				<div class="pull-right form-inline">
					<div class="btn-group">
						<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
						<button class="btn" data-calendar-nav="today">Today</button>
						<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
					</div>
					<div class="btn-group">
						<button class="btn btn-warning" data-calendar-view="year">Year</button>
						<button class="btn btn-warning active" data-calendar-view="month">Month</button>
						<button class="btn btn-warning" data-calendar-view="week">Week</button>
						<button class="btn btn-warning" data-calendar-view="day-manish">Day</button>
					</div>
					
				</div>
				<h3 id="head"></h3>
				</div>
				
				<div class="row">
				<div  class="span9">
				<div id="calendar"></div>
				</div>
				</div>
				<br />
				
			</div>
				<!-- /.container-fluid -->
				
        <!-- /#page-wrapper -->	
			<script type="text/javascript" src="js/underscore-min.js"></script>
			<script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
			<script type="text/javascript" src="js/calendar.js"></script>
			<script type="text/javascript" src="js/giant.js"></script>
			

<?php include_once("common/close.php");
}else 
{
header("login.php");
}

?>