<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
  	th,td,tr{
  		text-align:center;
  	}

  	
  </style>
  
</head>
<body>

	<div class="banner" style=" margin-bottom: 0px;">
	  <img src="logo.jpg" style="width: 100%; height: 80px;" alt="">
    <div class="banner-left" style="position: absolute; left: 1190px; top: 24px;">
      <div class="input-group">
        
        <div class="input-group-btn">
          <a href="index.php"><button class="btn btn-default">Back to Home</button></a>
        </div>
      </div>
    </div>
	</div>

	<div class="container-fluid">
		<div class="row">
			
			<div class="well well-md">
						<h2 style="text-align: center;">Admin Panel</h2>
			</div>

			<div class="col-md-4"></div>
			<div class="col-md-4">
				
				<form action="" method="POST">
					<br><br>
					<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					    <input id="email" type="text" class="form-control" name="name" placeholder="Username">
					  </div><br><br>

					  <div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
					  </div><br><br>


					
					<input type="submit" name="submit" value="submit" class="btn btn-default">
					


					
				</form>




			</div>
			<div class="col-md-4"></div>
			
			
			
			
		</div>
	</div>

	<div class="container-fluid">
	    <div class="row" style="background:#181818; padding: 20px; margin-top: 300px;">
	      <p style="text-align: center; color: white;"> &copy Copyright | 2018 @ quickpercel.com</p>
	    </div>
	  </div>
</body>
</html>


<?php
include 'connection.php';
session_start();

if (isset($_POST["submit"])) {

	$name=$_POST['name']; 
	$password=$_POST['password']; 



	$sql="SELECT * FROM adminlogin WHERE username='$name' and password='$password'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
			$_SESSION["admin_id"] =$row["admin_id"] ;
		}

		
	    header('Location: '.'preCustomer.php');
	    
	}
	else {
	    $_SESSION["error2"] = "Wrong Username or Password";
	    header('Location: '.'adminLogin.php');
	}
}
?>


