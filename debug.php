
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IIT INDORE EQUIPMENT RESERVATION SYSTEM
	</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom css for calendar -->
	<link rel="stylesheet" href="css/calendar.css">			
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  User Name <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                        <a href="addequipment.php"><i class="fa fa-fw fa-plus"></i> Add equipment</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-remove"></i> Cancel Booking</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		
<div id="page-wrapper">
	<div class="container-fluid">
	<div class="Page-Header"><center><h1>Perform Booking</h1></center></div>
	<form name="myForm" role="form" action="booking2.php" method="POST">
		<div class="form-group">
		<label for="name">Name:</label><input type="text" id ="name" value="hursh" readonly></input>
		</div>
		<div class="form-group">
		<label for="ename">Equipment Name:</label><input type="text" id ="ename" value="equip1"readonly></input>
		</div>
		<div class="form-group">
		<label for="sdate">Start Date:</label><input type="date" id ="sdate" value=""readonly></input>
		</div>
		<div class="form-group">
		<label for="name">Start Time:</label><input type="text" id ="starttime" name="starttime" placeholder="hh:mm:ss"></input>
		</div>
		<div class="form-group">
		<label for="name">End Time:</label><input type="text" id ="endtime" name="endtime" placeholder="hh:mm:ss"></input>
		</div>
		<input type="hidden" id ="end" name="end"></input>
		<input type="hidden" id ="start" name="start"></input>
		<button class=".btn-success" type="submit">Book It!</button>
	</form>
	</div>
</div>
 <script>
 $(document).ready(function(){
	$("#myForm").submit(function()
		{
		var ans=1;
		var y = $("#sdate").value;
		var s=y.split('-');
		var i=0;
		while(i<3)
		{
			ans=ans*parseInt(s[i]);
			i++;
		}
		var day_cal=ans;//day calculation done;
	
	
		var x = $("#starttime").value;
		var p = x.split(':');
		if (p.length)
		{	i=0;
			while(i<p.length)
			{
			ans=ans*parseInt(p[i]);
			i++;
			}
		}
		ans=ans*1000;
		alert("Start date: "+ ans);
		$('#start').value=ans.toString();
	//'start' added to form
		var x1 = $("#endtime").value;
		var q=x1.split(':');
		var ans2=day_cal;
		if (q.length)
		{	i=0;
			while(i<q.length)
			{
			ans2=ans2*parseInt(q[i]);
			i++;
			}
		}
		ans2=ans2*1000;
		alert("End date: "+ ans*1000);
		$('#end').value=ans2.toString();
		
		return true;
	});
	});
}

</script>

</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

