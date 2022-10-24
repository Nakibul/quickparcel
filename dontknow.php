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
						    <li><a href="senderProfile.php">Your profile</a></li>
						    <li class="active"><a href="senderConfirmOrder.php">Confirm Order</a></li>
						    <li><a href="#">Previous order</a></li>
						    <li><a href="senderPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>

						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Confirm order</h2>
				</div>
			<div class="col-xs-9" style="margin-top: 50px ">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-5" style="background: #ddd; height: 400px; border-radius: 10px;">
						<?php

							
							include'connection.php';
							$id_ver = $_SESSION["Id"];
							
							$sql="SELECT * FROM currierconfirm WHERE sender_id = '$id_ver'";
							$result = $conn->query($sql);
						    if ($result->num_rows > 0) { 
						         while($row = $result->fetch_assoc()) {
						           $one = $row["rec_name"];
						           
						        }
						           
						    }

							
						?>
					</div>
					<div class="col-xs-1"></div>

					<div class="col-xs-4" style="background: #ddd; height: 400px; border-radius: 10px;">
						<h3>Payment method by Bkash </h3><br><br>
						<p>Dial *247#</p>
						<p>Press option 3 for payment</p>
						<p>Enter account number 017########</p>
						<p>Enter amount</p>
						<p>Reference "1"</p>
						<p>Counter no "1"</p>

					</div>
					<div class="col-xs-1"></div>
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



