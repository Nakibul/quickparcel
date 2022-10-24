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
						     <li ><a href="currierPortal.php">My portal</a></li>
						    <li><a href="currierProfile.php">Your profile</a></li>
			                <li class="active"><a href="finalorder2.php">Final Order</a></li>
			                
									    
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
						<h2 style="text-align: center;">Final order list</h2>
			</div>
			<div class="col-xs-9" style="margin-top: 50px ">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						

							<?php
							
								include'connection.php';
								$id_ver = $_SESSION["Id"];
								
								$sqls="SELECT * FROM confirmorderlist WHERE carrier_id = '$id_ver'";
								$results = $conn->query($sqls);
							    if ($results->num_rows > 0) { 
							         while($rows = $results->fetch_assoc()) {
							         $car_id = $rows["carrier_id"];
							         $sen_id = $rows["sender_id"];
							         $rec_name = $rows["rec_name"];
							         $rec_phn = $rows["rec_phn"];
							         $rec_pic = $rows["rec_pic"];
							         $pro_pic = $rows["pro_pic"];
							           
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
					                <th>Name</th>
					                <th>Details</th>
					                <th>Product image</th>
					                <th colspan="2">Receiver information</th>
					                 
					            </tr>
					    <?php
					    while($row = $result->fetch_assoc()) {
					        ?>
					    
					      <tr class="active">
					        <td>
					        	<br><br>
					            <?php echo $i;   ?>
					            
					        </td>
					        <td>
					        	<br>
									
								<?php 
							    	include 'connection.php';
							    	$sql_one1="SELECT * FROM customer WHERE cid='$sen_id'";
							    	$result_one1 = $conn->query($sql_one1);
							    	if ($result_one1->num_rows > 0) { 
							    		 while($row_one1 = $result_one1->fetch_assoc()) {
							    		 	?>
							    		 	Sender name: <?php echo $row_one1["name"];?>
											
											<?php
							    		 	}
							    		}
							    ?>
								<br><br>
							    <?php 
							    	include 'connection.php';
							    	$sql_one11="SELECT * FROM customer WHERE cid='$car_id'";
							    	$result_one11 = $conn->query($sql_one11);
							    	if ($result_one11->num_rows > 0) { 
							    		 while($row_one11 = $result_one11->fetch_assoc()) {
							    		 	?>
							    		 	Carrier name: <?php echo $row_one11["name"];?>
											
											<?php
							    		 	}
							    		}
							    ?>




					        </td>
					        <td>
					            <?php echo $row["start"];   ?>
					            
					            &nbsp to &nbsp
					       
					            <?php echo $row["ends"] ;  ?><br><br>
					            Date:
					      		
					            <?php echo $row["dates"] ;  ?><br>
								Time:
					            <?php echo $row["timesJourney"] ;?>
					            
					        </td>
					        <td><br><br>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View</button>

											<!-- Modal -->
											<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

											    <!-- Modal content-->
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Product picture</h4>
											      </div>
											      <div class="modal-body">
											        
													<img height="350px" width="320px" src="uploads/receiver_info/<?php echo $pro_pic;?>">

											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>

											  </div>
											</div>


					        </td>
					         
					        

					        <td>
					        	<br>
					            Name: <?php echo $rec_name;?><br><br>
					            Phone: <?php echo $rec_phn;?>
					        </td>
					        <td><br>
					      <img height="100px" width="80px" src="uploads/receiver_info/<?php echo $rec_pic;?>">
					        	
					        </td>
					           
 
					        
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



