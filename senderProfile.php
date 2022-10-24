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
    	th,td{
    		font-size: 20px;
    	}
    </style>
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
						    <li><a href="senderPortal.php">My portal</a></li>
						    <li class="active"><a href="senderProfile.php">Your profile</a></li>
						    <li><a href="finalorder.php">Final Order</a></li>
						    
						    <li><a href="senderConfirmOrder.php">Update Order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red; color: white;">


							<?php 
						    	include 'connection.php';
						    	$lids=$_SESSION["Id"];
						    	$sql_one="SELECT * FROM currierconfirm WHERE sender_id='$lids'";
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
						    
						    <li><a href="#">Previous order</a></li>
						    <li><a href="senderPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>

						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Serder Profile</h2>
				</div>
			<div class="col-xs-9" style="margin-top: 50px ">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-3">
					<?php
						include'connection.php';
						$verify=$_SESSION["IdValidation"];
						$sql = "SELECT * FROM customer WHERE phone='$verify'";
						$result = $conn->query($sql);

							if ($result->num_rows > 0) {  
								while($row = $result->fetch_assoc()) {
									?><img height="250px" width="220px" src="uploads/images/<?php echo $row['pic_name'];?>">
									<?php
								}
							}
					?>
					<br><br><a href=""><button class="btn btn-primary">Edit Profile Photo</button></a>
				</div>
				<div class="col-xs-1"></div>
				<div class="col-xs-5">
					<?php
						include'connection.php';
						$verify=$_SESSION["IdValidation"];
						$sql = "SELECT * FROM customer WHERE phone='$verify'";
						$result = $conn->query($sql);

							if ($result->num_rows > 0) {  
								while($row = $result->fetch_assoc()) {
								?>
							    	<table class="table table-hover">
								        
								        <tr>
							             	<th >Name</th>
							                <td><?php echo $row["name"];   ?></td> 
							            </tr>
							            <tr>
							             	<th >Email</th>
							                <td><?php echo $row["email"];   ?></td> 
							            </tr>
							            <tr>
							             	<th >Phone</th>
							                <td><?php echo $row["phone"];   ?></td> 
							            </tr>
							            <tr>
							             	<th >Nid</th>
							                <td><?php echo $row["nid"];   ?></td> 
							            </tr>
							            <tr>
							             	<td></td>
							                <td></td> 
							            </tr>
							         </table>
						
							<?php }
							}
						?>
				</div>
				<div class="col-xs-1"><a href="senderProfileEdit.php"><button class="btn btn-primary">Edit Profile</button></a></div>
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
    	header('Location: '.'senderPortal.php');
	} 
	else {
    	echo "Error: " . $sql_three . "<br>" . $conn->error;
	}
}


?>