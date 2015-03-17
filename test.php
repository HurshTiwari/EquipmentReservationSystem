<!DOCTYPE php>
<?php include_once("/common/base.php");?>
<?php include_once("/common/head.php");?>
<?php include_once("/common/navbar_top_side.php");?>
		<div id="page-wrapper">
		<div class="container-fluid">
				<!-- Page Heading -->		
				<div class="page-header">	
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
						<button class="btn btn-warning" data-calendar-view="day">Day</button>
					</div>
				</div>
				<h3></h3>
				</div>
				<div class="row">
				<div  class="span9">
				<div id="calendar"></div>
				</div>
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/underscore-min.js"></script>
			<script type="text/javascript" src="js/calendar.js"></script>
			<script type="text/javascript" src="js/app.js"></script>
			</div>
				<!-- /.container-fluid -->
			</div>
        <!-- /#page-wrapper -->

<?php include_once("/common/close.php")?>