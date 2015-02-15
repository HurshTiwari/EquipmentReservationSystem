<?php
    include_once "common/base.php";                        
    $pagetitle = "Register";                               // This is just for the "Title" of the page
    include_once "common/head.php";                       
	?>
	<body>
	<div class="page-wrapper" style="background:#fff">
	<div class="container huge">

					<div class="row">
               
					<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2">
                    <!--form-->
					<form class="form" method="post" action="signup.php" id="registerform">
				            <div class="form-group">
                                <p class="form-control-static ">Username&nbsp
                                <input class="form-control" name="username" placeholder="xyz120001001"></p>
                            </div>
                            <div class="form-group">
                                <p class="form-control-static">Password&nbsp <input class="form-control" name="password" type="password" placeholder="********">
								</p>
                            </div>
                            <div class="form-group">
                                <p class="form-control-static ">Confirm Password&nbsp
                                <input class="form-control" name="confirm" type="password" placeholder="********">
								</p>
                            </div>
							
                            <div class="form-group">
                                <p class="form-control-static ">Email
                                <input class="form-control" name="email" type="email" placeholder="xyz@iiti.ac.in">
								</p>
                            </div>
							<div class="form-group">
                                <p class="form-control-static ">Roll No
                                <input class="form-control" name="rollno" type="text" placeholder="123456789">
								</p>
                            </div>
							&nbsp&nbsp&nbsp&nbsp
							<button class="btn btn-default" type="submit">Sign Up</button>						
							</form>	

						</div>
					</div>
				<?php	
				
				if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password']&&isset($_POST['email'])&&!empty($_POST['email'])))
				{													// For checking the sign up form															// has been submitted or not
					
					include_once "inc/class.users.inc.php";                    
					$users = new users($db);                       //If submitted,then we will create a 
																				//   new "Users()"
					echo $users->createAccount();                              // and "createAccount()"
				}			// which is a method will be called
				
				?>
				<form action="login.php">
				<button  class="btn btn-default">Go Back</button>
				</form>
	</div>		
<?php
include_once 'common/close.php';                              
?>
