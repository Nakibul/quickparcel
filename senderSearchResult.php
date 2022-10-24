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
    th,td{
     text-align: center;
    }
    </style>
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
						    <li class="active"><a href="senderPortal.php">My portal</a></li>
						    <li><a href="senderProfile.php">Your profile</a></li>
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
						    
						    <li><a href="#">Previous history</a></li>
						    <li><a href="senderPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>

						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Your search result</h2>
				</div>
			<div class="col-xs-9">
				
				<div class="row">
					
					<div class="col-xs-12">
						<?php

							include'connection.php';

							if (isset($_POST["submit"])) {
							        $start_1=$_POST["district1"];
									$end_1=$_POST["district2"];
									$date_1=$_POST["dates"];

								
							}


							$idm=$_SESSION["Id"];
							$sql_two = "SELECT * FROM currieractivedetail WHERE cid!='$idm' AND start='$start_1' AND ends='$end_1' AND dates='$date_1'";
							$result = $conn->query($sql_two);
							echo "<a href='senderPortal.php'><button class='btn btn-primary'>Back to search</button></a><br><br>";
												    
								$i=1;
								if ($result->num_rows > 0) {  
									 ?>		    
									    <table class="table table-bordered">
									            
								             <tr class="success">
								             	<th>No</th>
								                <th>From</th>
								                <th>To</th> 
								                <th>Date</th>
								                <th>Time</th>
								                <th>View</th>
								                <th>Choose</th>
								             </tr>
									    <?php
								    while($row = $result->fetch_assoc()) {
									?>
												    
									      <tr class="active">
										        <td><br><br>
										            <?php echo $i;   ?>
										        </td>
										        <td><br><br>
										            <?php echo $row["start"];   ?>
										        </td>
										        <td><br><br>
										            <?php echo $row["ends"] ;  ?>
										        </td>
										        <td><br><br>
										            <?php echo $row["dates"] ;  ?>
										        </td>
										        <td><br><br>
										            <?php echo $row["timesJourney"];   ?>    
										        </td> 
										        
<td>


	
    <?php 
    	$rowCid=$row['cid'];
    	$sql_one="SELECT * FROM customer WHERE cid='$rowCid'";
    	$result_one = $conn->query($sql_one);
    	if ($result_one->num_rows > 0) { 
    		 while($row_one = $result_one->fetch_assoc()) {
    		 	?>
    		 	<table class="table table-bordered">
						<tr>
			             	<th  class="success"><br>Name</th>
			                <th><br><?php

			                $id_for_carrier=$row_one['cid'];
			                 echo $row_one["name"]; ?></th>
			                <th rowspan="3"><img height="70px" width="65px" src="uploads/images/<?php echo $row_one['pic_name'];?>"></th>
			             </tr>
			             
					</table>
					<?php
    		 }
    	}
    ?>    
</td> 
								<td><br><br>
						            
						            
						            <a class="btn btn-primary" href="senderReceiverInfo.php?id=<?php echo $id_for_carrier;?>"
                   	 	>select</a>
						        </td> 
					       </tr>
									   
									        
									    <?php
									    $i++; 
									}?>

									  </table> <?php
								} else {
									    echo "<br><br> <div class='alert alert-danger'><p>Sorry!!! Don't match with any carrier</p></div>";
									}

							?>
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


