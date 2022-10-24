<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>


#mySidenav a {
    position: absolute;
    margin-top: 200px;
    left: -100px;
    transition: 0.3s;
    padding: 10px;
    width: 160px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#about {
    top: 30px;
    background-color: #3B5998;
}

#blog {
    top: 90px;
    background-color: #2196F3;
}

#projects {
    top: 150px;
    background-color: #FF0000;
}

#contact {
    top: 210px;
    background-color: #dd4b39
}


.button {
  border-radius: 4px;
  background-color: #555555;
  border: none;
  color: white;
  text-align: center;
  padding: 2px 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  font-size: 15px;
  
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
body, html {
  height: 100%;
  margin: 0;
  font: 400 15px/1.8 "Lato", sans-serif;
  color: #777;
}

.bgimg-1, .bgimg-2, .bgimg-3 {
  position: relative;
  opacity: 0.65;
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}
.bgimg-1 {
  background-image: url("10.jpg");
  min-height: 100%;
  opacity: .9;
}

.bgimg-2 {
  background-image: url("pic2.jpg");
  min-height: 400px;
}

.bgimg-3 {
  background-image: url("pic3.jpg");
  min-height: 400px;
}

#msg{
	position: absolute;
	padding: 10px 20px;
    background-color: #f44336;
    color: white;
    top: -58px;
    right: 5px;
    }

.caption {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}

.logo_img > img{
	position: absolute;
	top: 20px;
	left: 40px;
	width: 100px;
	height: 100px;
	border-radius: 50px;
}

.logo_img2 > img{
	position: absolute;
	top: 51px;
	left: 130px;
	width: 150px;
	height: 35px;
	border-radius: 0 15px 15px 0;
}

.caption span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

h3 {
  letter-spacing: 5px;
  text-transform: uppercase;
  font: 20px "Lato", sans-serif;
  color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
</style>
 <script>
		$(document).ready(function(){
		    
		    
		        $("#msg").fadeOut(4000);
		});
	</script>
</head>
<body>





<div class="bgimg-1">
  <div class="caption">
    
    
  </div>
</div>


  
  <div class="container" style="padding: 20px 5px;">
	  <div id="mySidenav" class="sidenav">
		  <a href="#" id="about">Facebook&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-facebook"></span></a>
		  <a href="#" id="blog">Twitter&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-twitter"></span></a>
		  <a href="#" id="projects">Youtube&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-youtube-play"></span></a>
		  <a href="#" id="contact">Google&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-google"></span></a>
		</div>

		<div class="logo_img">
			<img src="logo2.jpg" alt="">
		</div>
		<div class="logo_img2">
			<img src="logo3.jpg" alt="">
		</div>


  	<div class="login" style=" width: 400px; height: 500px; position: absolute;background: white; top: 65px; right: 40px; ">
  		<div class="sub_login" style="padding: 20px 40px;">
  		<h3>Login as..</h3><a href="adminLogin.php"><button class="btn btn-default" style="position: absolute; right: 40px; top: 40px;">Admin</button></a><br>
  		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#menu1">Sender</a></li>
		    <li><a data-toggle="tab" href="#menu2">Carrier</a></li>
		  </ul>
			<!-- login tab-->
		  <div class="tab-content">
		    <div id="menu1" class="tab-pane fade in active">
		      	<form action="senderAction.php" method="POST">
		      		<br>
		      		<label for="" style="color: black;">Sender Phone number:</label>
		      	  	<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" name="phone" class="form-control" placeholder="Phone Number" required="required">
					</div><br>
					<label for="" style="color: black;">Password:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div><br>

					<?php
		                if(!empty($_SESSION["error"]))
		                    {
		                        echo " <p class='alert'  id='msg'>Wrong Username or password</p>";
		                        session_unset();
		                        session_destroy();
		                    }
		                ?>
					
					<div class="input-group">
						<button type="submit" name="submit" class="button"><span>Login </span></button>
						
					</div>
				</form>
		    </div>
		    <div id="menu2" class="tab-pane fade">
		     	<form action="currierAction.php" method="POST">
		      		<br>
		      		<label for="" style="color: black;">Carrier Phone Number:</label>
		      	  	<div class="input-group">
		      	  		
						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="text" name="phone" class="form-control" placeholder="Phone Number" required="required">
					</div><br>
					<label for="" style="color: black;">Password:</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div><br>
					
					<div class="input-group">
						<button type="submit" name="submit" class="button"><span>Login </span></button>
						
					</div>
				</form>
		    </div><br>
		    <p>forgot password?</p>
		    <p>Don't have a account? <a data-toggle="modal"  data-target="#myModal">Register Now</a></p>
		    <div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Fill up your personal details</h4>
			      </div>
			      <div class="modal-body">
				        <form action="" method="POST" enctype="multipart/form-data">
				      	  	<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" name="name_reg" class="form-control" placeholder="Full name" pattern="(?=.*[a-z,A-Z]).{5,30}" title="Insert a valid name" required>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input type="email" name="email_reg" class="form-control" placeholder="Email" required="required">
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
								<input type="text" name="phone_reg" class="form-control" placeholder="Phone number" pattern="(?=.*\d).{10,}" title="Contain 11 or more digit " required>
							</div><br>
							<div class="input-group" style="width: 600px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input  type="text" name="nid_reg" class="form-control" placeholder="National ID" pattern="(?=.*\d).{17,}" title="Contain 17 digit" required>
								
								<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
								<input style="width: 270px;" type="file" class="form-control" name="nid_image_reg" class="btn btn-default" accept="image/*" title="select a valid picture" required="required">
							</div>
							<br>
							
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
								<input type="password" name="password_reg" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number,one uppercase,lowercase letter and 8 or more characters" required>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
								<input type="password" name="conPassword_reg" class="form-control" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number,one uppercase,lowercase letter and 8 or more characters" required>
							</div><br>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
								<input type="file" name="image_reg" class="btn btn-default" accept="image/*" title="select a valid picture" required="required">
							</div><p style="color: red;">*Add your latest profile picture</p><br>
							
							<div class="input-group">
								<input type="submit" name="submit_reg" class="btn btn-primary" value="Register">
								&nbsp&nbsp
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">
							</div>
						</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		  </div><!--.tab-->
		</div>
  	</div><!--.login-->
    <div class="row">
      
      <div class="col-md-7">
      	<h3 style="text-align:center;">About Us</h3>
      	<p style="text-align: justify;"><strong>
          Quick percel is a travelling based courier service from Dhaka to whole Bangladesh. We deliver documents or files as well as small parcels to the clients of ecommerce sites. E-commerce will be the primary group of customers and the prime targeted. The premium feature of backpack.com.bd is, we have online tracking system which enables customers to locate his/her products' current location through android apps, our website or via text messaging during transferring. So you just order give us parcel and it's our duty to deliver your product to the right hand.
        </strong></p>
      </div>
        
      
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <img src="delivery.jpg" alt="" height="200px" width="300px" style="margin-top: 25px;">
      </div>
    </div>
    </div>

 





</body>
</html>

<?php

include'connection.php';

if (isset($_POST["submit_reg"])) {
        $name_reg=$_POST["name_reg"];
		$email_reg=$_POST["email_reg"];
		$phone_reg=$_POST["phone_reg"];
		$nid_reg=$_POST["nid_reg"];
		$password_reg=$_POST["password_reg"];
		$conPassword_reg=$_POST["conPassword_reg"];
		
		$filename = $_FILES['image_reg']['name'];
		$filepath = $_FILES['image_reg']['tmp_name'];
		move_uploaded_file($filepath, "uploads/images/".$filename);

		$filename2 = $_FILES['nid_image_reg']['name'];
		$filepath2= $_FILES['nid_image_reg']['tmp_name'];
		move_uploaded_file($filepath2, "uploads/nid/".$filename2);


		


		$sql_reg= "INSERT INTO preCustomer (name,email,phone,nid,password,pic_name,nid_pic) values('$name_reg', '$email_reg','$phone_reg','$nid_reg','$password_reg','$filename','$filename2')";
		
		
	if ($conn->query($sql_reg)=== TRUE) {
    	 echo "<script>window.alert('Registration Successfull');</script>";
    	 //header('Location: '.'index.php');
	} 
	else {
    	echo "Error: " . $sql_reg . "<br>" . $conn->error;
	}
}


?>

