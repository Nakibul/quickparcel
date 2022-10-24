<?php
ob_start();

?>

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
             die("asdfg");
        }

        //echo $_GET["id"];
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
			<div class="col-xs-3" style="background: #5F5F5F; height: 1000px;">
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
						<h2 style="text-align: center;">Information</h2>
			</div>
			<div class="col-xs-9" style="margin-top: 50px ">

			<div class="row">
			<div class="col-xs-1"></div>
				<div class="col-xs-10" style="background: #ddd; border-radius: 20px;">

				<h3 style="text-align: center;">Carrier information</h3><br>
					
<?php 
	include'connection.php';
    	$ids=  $_GET["id"];

    	$sql_one="SELECT * FROM customer WHERE cid= $ids";
    	$result_one = $conn->query($sql_one);
    	if ($result_one->num_rows > 0) { 
    		 while($row_one = $result_one->fetch_assoc()) {
    		 	$carrier_name=$row_one["name"];
                $carrier_phone=$row_one["phone"];
                $carrier_email=$row_one["email"];
                $carrier_img=$row_one["pic_name"];

    		 	?>

    		 	<table class="table table-bordered">
						<tr>
			             	<th>Name</th>
			                <td><?php echo $row_one["name"]; ?></td>
			                <th rowspan="3"><img height="120px" width="100px" src="uploads/images/<?php echo $row_one['pic_name'];?>"></th>
			             </tr>
			             <tr>
			             	<th>Phone Number</th>
			             	<td><?php  echo $row_one["phone"];?></td>
			             </tr>
			             <tr>
			             	<th>Email</th>
			             	<td><?php echo $row_one["email"];?></td>
			             </tr>
					</table>
				<?php	
    		 }
    	}
?>
    	


				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10"  style="background: #ddd; border-radius: 20px;">
					<h3 style="text-align: center;">Receiver's Information</h3><br><br>
					<div class="row">
						<div class="col-xs-2"></div>
						<div class="col-xs-8">
							<form action="" method="POST" enctype="multipart/form-data">
						
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" name="name_receiver" class="form-control" placeholder="Full name" pattern="(?=.*[a-z,A-Z]).{5,30}" title="Insert a valid name" required>
								</div><br>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
									<input type="text" name="phone_receiver" class="form-control" placeholder="Phone number" pattern="(?=.*\d).{10,}" title="Contain 11 or more digit " required>
								</div><br>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
									<input type="file" name="image_rev_pic" class="btn btn-default" accept="image/*" title="select a valid picture" required="required">
									
								</div><p style="position: absolute; color: red; left: 350px; top: 115px;">*Enter receiver's latest picture</p><br>

								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
									<input type="file" name="image_product" class="btn btn-default" accept="image/*" title="select a valid picture" required="required">

								</div><p style="position: absolute;color: red; top: 170px;left: 350px;">*Enter product image</p><br>

								<div class="input-group">
									<input type="submit" name="submit_receiver" class="btn btn-primary" value="Submit">
								</div><br><br>
							</form>
						</div>
					</div>
					

				</div>
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

if (isset($_POST["submit_receiver"])) {
        $name=$_POST["name_receiver"];
		$phone=$_POST["phone_receiver"];
		//$image_rev_pic=$_POST["image_rev_pic"];
		//$image_product=$_POST["image_product"];
		$carrier_id=$ids;
		$sender_id=$_SESSION["Id"];


		$image_rev_pic = $_FILES['image_rev_pic']['name'];
		$filepath = $_FILES['image_rev_pic']['tmp_name'];
		move_uploaded_file($filepath, "uploads/receiver_info/".$image_rev_pic);

		$image_product = $_FILES['image_product']['name'];
		$filepath2= $_FILES['image_product']['tmp_name'];
		move_uploaded_file($filepath2, "uploads/receiver_info/".$image_product);




$sql_four= "INSERT INTO senderactivity (receiver_name,receiver_phone,receiver_pic,product_pic,carrier_id,sender_id) values('$name','$phone','$image_rev_pic','$image_product','$carrier_id','$sender_id')";
		
		
	if ($conn->query($sql_four)=== TRUE) {
    	// echo "successfully";
    	$_SESSION['msg2']="successfully completed";
    	header('Location: senderPortal.php');
	} 
	else {
    	echo "Error: " . $sql_four . "<br>" . $conn->error;
	}


}


?>
<?php
ob_end_flush();

?>