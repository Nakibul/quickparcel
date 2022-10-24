

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
    ?>
    <style>
    	li>a{
    	color: white;
    	font-size: 16px;
    }
    #msg{
    	position: absolute;
    	top: 232px;
    	right: 80px;
    }
    </style>
    <script>
		$(document).ready(function(){
		    
		    
		        $("#msg").fadeOut(4000);
		});
	</script>
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
						    <li><a href="currierProfile.php">Your profile</a></li>
						    <li><a href="finalorder2.php">Final Order</a></li>
						    
						    <li><a href="currierOrderDetails.php">Activity Details</a></li>
						    <li><a href="currierRequestedOrders.php">Requested order&nbsp&nbsp&nbsp&nbsp<span class="badge" style="background: red;">


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
						    <li  class="active"><a href="currierPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>
						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Change Your Password</h2>
				</div>
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-3"></div>
					<div class="col-xs-5">
						
						<form action="" method="POST" onsubmit="return " id="submit_form">
							<p>Old password:</p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
								<input type="password" id="myInput" name="old_password" class="form-control" placeholder="Enter your old password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number,one uppercase,lowercase letter and 8 or more characters" required><span style="background: white;" class="input-group-addon"><i class="glyphicon glyphicon-eye-open" onclick="myFunction()" type="checkbox"></i></span>

<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>


							</div><br> <br>
							<p>New password:</p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
								<input type="password" id="myInput2" name="new_password" class="form-control" placeholder="Enter your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number,one uppercase,lowercase letter and 8 or more characters" required><span style="background: white;" class="input-group-addon"><i class="glyphicon glyphicon-eye-open" onclick="myFunction2()" type="checkbox"></i></span>

<script>
function myFunction2() {
    var x = document.getElementById("myInput2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>



							</div><br><br>
							<p>Confirm password:</p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
								<input type="password" id="myInput3" name="conNew_password" class="form-control" placeholder="Re-enter your new Password" required=""><span style="background: white;" class="input-group-addon"><i class="glyphicon glyphicon-eye-open" onclick="myFunction3()" type="checkbox"></i></span>


<script>
function myFunction3() {
    var x = document.getElementById("myInput3");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>


							</div><br><br>
							<input type="submit" name="submit" id="submit" value="Change Password" class="btn btn-danger">
							<span id="error_message" class="text-danger"></span>
							<span id="success_message" class="text-success"></span>

						</form>
					</div>
					<div class="col-xs-2"></div>
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

    $verifyyID=$_SESSION["Id"];
	$sql="SELECT * FROM customer WHERE cid='$verifyyID'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
			$checkPass2 =$row["password"] ;
		}
	    
	}


if (isset($_POST["submit"])) {
	$checkPass1=$_POST["old_password"];
	
	if ($checkPass1==$checkPass2) {
			
		$checkPass3=$_POST["new_password"];
		$checkPass4=$_POST["conNew_password"];

		if ($checkPass3==$checkPass4) {

			$verifyyID=$_SESSION["Id"];

			$sql= "UPDATE customer SET password='$checkPass3' WHERE cid='$verifyyID'";
		

			if ($conn->query($sql) === TRUE) {
		    	echo " <div class='alert alert-success'  id='msg'><p>Password Change successfully</p></div>";
		    	
			} 
			else {
		    	echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		else{
			echo " <div class='alert alert-danger'  id='msg'><p>New password don't match</p></div>";
			
			
		}
	}
	else{
		echo " <div class='alert alert-danger'  id='msg'><p>Please check old password</p></div>";
		
		
	}
}


?>

<script>
	
</script>