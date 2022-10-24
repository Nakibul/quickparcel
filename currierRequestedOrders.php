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
    	th,td{
     text-align: center;
    }
    li>a{
    	color: white;
    	font-size: 16px;
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
			<div class="col-xs-3" style="background: #5F5F5F; height: 600px;">
				<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-8" style="margin-top:20px; ">
						<ul class="nav nav-pills nav-stacked">
						    <li><a href="currierPortal.php">My portal</a></li>
						    <li><a href="currierProfile.php">Your profile</a></li>
						    <li><a href="finalorder2.php">Final Order</a></li>
						    
						    <li><a href="currierOrderDetails.php">Activity Details</a></li>
						    <li class="active"><a href="currierRequestedOrders.php">Requested order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red; color: white;">


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
				<h2 style="text-align: center;">Requesting details</h2>
			</div>
			
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
				
				<?php			
				include'connection.php';
					$lids=$_SESSION["Id"];
					$sqls = "SELECT * FROM senderactivity WHERE carrier_id='$lids'";
					$results = $conn->query($sqls);
					$i=1;
					if ($results->num_rows > 0) { 
					    while($rows = $results->fetch_assoc()) {
					       $count = $rows["sender_id"];
					       $count2 = $rows["sid"];

					    
				
					
					$sql = "SELECT * FROM customer WHERE cid='$count'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
					    ?>
					    
					    <table class="table table-bordered">
					     <?php
					    while($row = $result->fetch_assoc()) {
					        ?>       
					             <tr>
					             	<th rowspan="2"> <br><?php echo $i;?></th>
					                <th>Sender name</th>
					                <th>Receiver name</th>
					              	<th>Product Picture</th>
					                <th>Action</th>
					             </tr>
					    
					    
							      <tr>
							        <td><?php echo $row["name"];   ?></td>
							        <td><?php echo $rows["receiver_name"];   ?></td>
							        <td>
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
											        
													<img height="350px" width="320px" src="uploads/receiver_info/<?php echo $rows['product_pic'];?>">

											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											      </div>
											    </div>

											  </div>
											</div>
						             		
						             	</td>
							        <td>
										<a href="currierAccept.php?id3=<?php echo $count2?>"><button class="btn btn-success">Accept</button></a>



							        	&nbsp&nbsp

							        	 <a href="currierReject.php?id2=<?php echo $count2?>"><button class="btn btn-danger">Reject</button></a>
							        </td>
							      </tr>
					   <?php
					    $i++; }
					   
					} 

}
					}else {
					    echo "";
					    echo " <div class='alert alert-danger' style='width:400px;'><p>No request available</p></div>";
					}

				?>
				</div>
				<div class="col-xs-1"></div>
				</div>
			</div>
				
			
		</div>
	</div>

	</table>
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


