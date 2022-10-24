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

        if(empty($_SESSION["admin_id"]))
        {
             header('Location: '.'adminLogin.php');
        }
    ?>




  <style>
  	th,td,tr{
  		text-align:center;
  	}

  	
  </style>
  
</head>
<body>

	<div class="banner" style=" margin-bottom: 0px;">
	  <img src="logo.jpg" style="width: 100%; height: 80px;" alt="">
    <div class="banner-left" style="position: absolute; left: 1225px; top: 24px;">
      <div class="input-group">
        
        <div class="input-group-btn">
          <a href="adminLogOut.php"><button class="btn btn-default">Logout</button></a>
        </div>
      </div>
    </div>
	</div>

	<div class="container-fluid">
		<div class="row">
			
			<div class="well well-md">
						<h2 style="text-align: center;">Admin Panel</h2>
			</div>

			<div class="col-md-1"></div>
			<div class="col-md-10">
				

			<?php 
				include'connection.php';

			    	$sql_one="SELECT * FROM precustomer";
			    	$result_one = $conn->query($sql_one);
			    	if ($result_one->num_rows > 0) { 
			    		 while($row_one = $result_one->fetch_assoc()) {

			    		 		$a = $row_one["name"];
			    		 		$b = $row_one["email"];
			    		 		$c = $row_one["phone"];
			    		 		$d = $row_one["nid"];
			    		 		$e = $row_one["password"];
			    		 		$f = $row_one["pic_name"];
			    		 		$g = $row_one["nid_pic"];
			    		 		$h = $row_one["pcid"];

			    		 	?>

			    		 	<table class="table table-bordered">
									<tr>
						             	<th>Name</th>
						             	<th>Email</th>
						             	<th>phone</th>
						             	<th>NID</th>
						             	<th>Verify image</th>
						             	<th>Verify</th>
						             </tr>
						             <tr>
						             	<td><br><br><?php echo $row_one["name"];?></td>
						             	<td><br><br><?php echo $row_one["email"];?></td>
						             	<td><br><br><?php echo $row_one["phone"];?></td>
						             	<td><br><br><?php echo $row_one["nid"];?></td>
						             	<td>

						             
											        
													<img height="120px" width="80px" src="uploads/images/<?php echo $row_one['pic_name'];?>">
						             	
						             				<img height="120px" width="150px" src="uploads/nid/<?php echo $row_one['nid_pic'];?>">

											     
						             		
						             	</td>
						             	<td><br><br>
						             		<a href="precustomercheck.php?id=<?php echo $h?>"><button class="btn btn-primary">Accept</button></a>
						             		<a href="precustomercheck2.php?id=<?php echo $h?>"><button class="btn btn-danger">Delete</button></a>
						             	</td>
						             </tr>
						             
								
						





			</div>
			<div class="col-md-1"></div>
			
			
			
			
		</div>
	</div>

		<?php	
			    		 }
			    	}
			    	else{
			    		echo "<h1>No customer adding request :(</h1>";
			    	}
			?>

</body>
</html>





