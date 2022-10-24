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
    		text-align:center; 
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
						    <li><a href="finalorder.php">Final Order</a></li>

						    <li class="active"><a href="senderConfirmOrder.php">Update Order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red; color: white;">


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
						<h2 style="text-align: center;">Update order</h2>
			</div>
			<div class="col-xs-9" style="margin-top: 50px ">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						

							<?php
							
								include'connection.php';
								$id_ver = $_SESSION["Id"];
								
								$sqls="SELECT * FROM currierconfirm WHERE sender_id = '$id_ver'";
								$results = $conn->query($sqls);
							    if ($results->num_rows > 0) { 
							         while($rows = $results->fetch_assoc()) {
							         $car_id = $rows["carrier_id"];
							           
							        }
							           
							    }

					global $car_id;
					$sql = "SELECT * FROM currieractivedetail WHERE cid='$car_id'";
					$result = $conn->query($sql);
					$i=1;
					if ($result->num_rows > 0) {
					    ?>
					    
					    <table class="table table-bordered">
					            
					             <tr class="success">
					             	<th>No</th>
					                <th>Activity</th>
					                <th>Status</th>
					                <th>Contact</th>
					                <th>Action</th>
					                 
					            </tr>
					    <?php
					    while($row = $result->fetch_assoc()) {
					        ?>
					    
					      <tr class="active">
					        <td>
					        	<br>
					            <?php echo $i;   ?>
					            
					        </td>
					        <td>
					            <?php echo $row["start"];   ?>
					            
					            &nbsp to &nbsp
					       
					            <?php echo $row["ends"] ;  ?><br>
					            Date:
					      		
					            <?php echo $row["dates"] ;  ?><br>
								Time:
					            <?php echo $row["timesJourney"] ;?>
					            
					        </td>
					        <td><br><p>Confirmed by Carrier</p></td>
					         
					        

					        <td>
					        	<br>
					            <?php

					            	include'connection.php';
								
								$sqls1="SELECT * FROM customer WHERE cid = '$car_id'";
								$results1 = $conn->query($sqls1);
							    if ($results1->num_rows > 0) { 
							         while($rows1 = $results1->fetch_assoc()) {
							         echo $rows1["phone"];
							           
							        }
							           
							    }



					            ?>
					         <?php			
								include'connection.php';
								$lids=$_SESSION["Id"];
								$sqls4 = "SELECT * FROM currierconfirm WHERE sender_id='$lids'";
								$results4 = $conn->query($sqls4);
								if ($results4->num_rows > 0) { 
								    while($rows4 = $results4->fetch_assoc()) {
								       $count4 = $rows4["seid"];
								       	?>
					        </td>
					        <td><br>
					        
					        		<a href="confirmorder.php?id4=<?php echo $count4?>"><button class="btn btn-primary">OK</button></a>
					        	
					        </td>
					           <?php
					     }
					   
					} ?>
 
					        
					      </tr>
					   </table>
					        
					    <?php
					    $i++; }
					   
					} else {
					    echo "No activity available";
					}



				?>







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



