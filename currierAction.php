<?php
include 'connection.php';
session_start();

if (isset($_POST["submit"])) {

	$myPhone=$_POST['phone']; 
	$myPassword=$_POST['password']; 



	$sql="SELECT * FROM customer WHERE phone='$myPhone' and password='$myPassword'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
			$_SESSION["Id"] =$row["cid"] ;
		}

		$_SESSION["IdValidation"] =$myPhone;
	    header('Location: '.'currierPortal.php');
	    
	}
	else {
	    $_SESSION["error"] = "Wrong Username or Password";
	    header('Location: '.'index.php');
	}
}
?>