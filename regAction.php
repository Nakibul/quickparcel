<?php

include'connection.php';

if (isset($_POST["submit"])) {
        $name=$_POST["name"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$nid=$_POST["nid"];
		$password=$_POST["password"];
		$conPassword=$_POST["conPassword"];
		
		$filename = $_FILES['image']['name'];
		$filepath = $_FILES['image']['tmp_name'];
		move_uploaded_file($filepath, "uploads/images/".$filename);


		


		$sql= "INSERT INTO customer (name,email,phone,nid,password,pic_name) values('$name', '$email','$phone','$nid','$password','$filename')";
		
		
	if ($conn->query($sql)=== TRUE) {
    	 echo "<script>window.alert('Registration Successfull');</script>";
    	 //header('Location: '.'index.php');
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


?>

