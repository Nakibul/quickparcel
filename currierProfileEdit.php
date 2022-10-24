<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
    	li>a{
    	color: white;
    	font-size: 16px;
    }
    #msg{
    	position: absolute;
    	top: 120px;
    	right: 60px;
    }
    </style>
    <script>
		$(document).ready(function(){
		    
		    
		        $("#msg").fadeOut(4000);
		});
	</script>
  <?php
        session_start();

        //$id=$_SESSION["Id"];


        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
    ?>
</head>
<body>

	<div class="banner" style=" margin-bottom: 0px;">
	  <img src="logo.jpg" style="width: 100%; height: 80px;" alt="">
    <div class="banner-left" style="width: 250px;position: absolute; right: 25px; top: 24px;">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3" style="background: #5F5F5F; height: 700px;">
				<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-8" style="margin-top:20px; ">
						<ul class="nav nav-pills nav-stacked">
						    <li><a href="currierPortal.php">My portal</a></li>
						    <li class="active"><a href="currierProfile.php">Your profile</a></li>
						    <li><a href="finalorder2.php">Final Order</a></li>
						    
						    <li><a href="currierOrderDetails.php">Activity Details</a></li>
						    <li><a href="currierRequestedOrders.php">Requested order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red;">


							<?php 
    	include 'connection.php';
    	$lids=$_SESSION["Id"];
    	$sql_one="SELECT * FROM senderactivity WHERE carrier_id='$lids'";
    	$i=0;
    	$result_one = $conn->query($sql_one);
    	if ($result_one->num_rows > 0) { 
    		 while($row_one = $result_one->fetch_assoc()) {
    		 	$i++;
    		 	

    		 	}
    		 	echo $i;
    		}

    		 	?>









						    </span></a></li>
						    <li><a href="currierPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>

						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Update your Profile</h2>
				</div>
			<div class="col-xs-9">
			<div class="row">
				<div class="col-xs-3"></div>
				<div class="col-xs-6">
					<?php
						include'connection.php';
						$verify=$_SESSION["IdValidation"];
						$sql = "SELECT * FROM customer WHERE email='$verify'";
						$result = $conn->query($sql);

							if ($result->num_rows > 0) {  
							    while($row = $result->fetch_assoc()) {
							    	?>
									
									
								
						<form action="" method="POST">
					      		<br><br>
					      		<h5><label for="">Your full name:</label></h5>
					      	  	<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control" placeholder="Name" required="required">
								</div><br>
								<h5><label for="">Your email:</label></h5>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input type="email" name="email" value="<?php echo $row["email"]; ?>" class="form-control" placeholder="Email" required="required">
								</div><br>
								<h5><label for="">Your phone number:</label></h5>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
									<input type="text" name="phone" value="<?php echo $row["phone"]; ?>" class="form-control" placeholder="Phone number" required="required">
								</div><br>
								<h5><label for="">National ID number:</label></h5>
								<div class="input-group">

									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="nid"  value="<?php echo $row["nid"]; ?>" class="form-control" placeholder="National ID" required="required">
								</div><br>
								
						
								
								<div class="input-group">
									<input type="submit" name="submit" class="btn btn-primary" value="Update"><a href="currierProfile.php">&nbsp&nbsp&nbsp<input type="button"  class="btn btn-primary" value="Back to profile"></a>
								</div>
							</form>
					
					<?php }
							}
					?>
				</div>
				<div class="col-xs-3"></div>
			</div>
			
			</div>
			
		</div>
	</div>

	<div class="container-fluid">
	    <div class="row" style="background:#181818; padding: 20px;">
	      <p style="text-align: center; color: white;"> &copy Copyright | 2018 @ quickpercel.com</p>
	    </div>
	  </div>
</body>
</html>



<?php

include'connection.php';

if (isset($_POST["submit"])) {
		$name=$_POST["name"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$nid=$_POST["nid"];

		$verifyID=$_SESSION["Id"];

		
		$sql= "UPDATE customer SET name='$name',email='$email',phone='$phone',nid='$nid' WHERE cid='$verifyID'";
		

	if ($conn->query($sql) === TRUE) {
		echo "<meta http-equiv='refresh' content='2'>";
    	echo "<h3><span id='msg' class='label label-success'>Profile update successfully</span></h3>";

	} 
	else {
    	echo "Error: " . $sql_three . "<br>" . $conn->error;
	}
}


?>