<?php

require_once '/inc/core.inc.php';
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{  $user_id=$_SESSION['user_id'];
?>

<body>
    <div class="page-wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">IIT INDORE</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $user_id['name'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!--<li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search..">
                        <span class="input-group btn">
                         <button class="btn btn-inverse" type="button">
                          <i class="fa fa-search">
                          </i>
                        </button>
                        </span>
                    </div>
                    </li>-->
                    <?php 
						if($_SESSION['usertype']=='admin'){
					?>
					<li>
                        <a href="index.php"><i class="fa fa-fw fa-tasks"></i> Equipments</a>
                    </li>
                    <li>
                        <a href="allusers.php"><i class="fa fa-fw fa-users"></i> All Users</a>
                    </li>
                    <li>
                        <a href="addaccount.php"><i class="fa fa-fw fa-user"></i> Add user</a>
                    </li>
					<li>
                        <a href="deleteaccount.php"><i class="fa fa-fw fa-user"></i> Delete users</a>
                    </li>
                    <li>
                        <a href="addequipment.php"><i class="fa fa-fw fa-plus"></i> Add equipment</a>
                    </li>
					<li>
                        <a href="editequipment.php"><i class="fa fa-fw fa-plus"></i> Edit equipment</a>
                    </li>
                    <li>
                        <a href="cancelbooking.php"><i class="fa fa-fw fa-remove"></i> Cancel Booking</a>
                    </li>
					<li>
                        <a href="search.php"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
					<li>
                        <a href="giant.php"><i class="fa fa-fw fa-search"></i>View Full Calendar</a>
                    </li>
					<?php 
						}
						else if($_SESSION['usertype']=='user'){
					?>
					<li>
                        <a href="index.php"><i class="fa fa-fw fa-tasks"></i> Equipments</a>
                    </li>
					<li>
                        <a href="cancelbooking.php"><i class="fa fa-fw fa-remove"></i> Cancel Booking</a>
                    </li>
					<li>
                        <a href="search.php"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
					<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<?php    
}
	
else{
	  include('login.php');  
}
?>
