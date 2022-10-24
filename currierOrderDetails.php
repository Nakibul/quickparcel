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
						    
						    <li class="active"><a href="currierOrderDetails.php">Activity Details</a></li>
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
						    <li><a href="currierPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>
						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
				<h2 style="text-align: center;">Your activity details</h2>
			</div>
			
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
			


				<?php
					include'connection.php';
					$cid=$_SESSION["Id"];
					$sql = "SELECT * FROM currieractivedetail WHERE cid='$cid'";
					$result = $conn->query($sql);
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
					                <th>Action</th>
					                 
					            </tr>
					    <?php
					    while($row = $result->fetch_assoc()) {
					        ?>
					    
					      <tr class="active">
					        <td>
					            <?php echo $i;   ?>
					            
					        </td>
					        <td>
					            <?php echo $row["start"];   ?>
					            
					        </td>
					        <td>
					            <?php echo $row["ends"] ;  ?>
					            
					        </td>
					        <td>
					            <?php echo $row["dates"] ;  ?>
					            
					        </td>
					        <td>
					            <?php echo $row["timesJourney"];   ?>    
					        </td> 
					        

					        <td>
					            <a href="currierOrderDelete.php?id=<?php echo $row['caid'];?>"><button class="btn btn-danger">Cancel journey</button></a>
					            
					        </td>
					            
					        
					      </tr>
					   
					        
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


