<?php

include'connection.php';
include'precustomer.php';

$id = $_GET["id"];


 $sql="SELECT * FROM precustomer WHERE pcid = '$id'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
         while($row = $result->fetch_assoc()) {
           $one = $row["name"];
           $two = $row["email"];
           $three = $row["phone"];
           $seven = $row["nid"];
           $four = $row["password"];
           $five = $row["pic_name"];
           $six = $row["nid_pic"];
        }
           
    }

		$sql_one= "INSERT INTO customer (name,email,phone,nid,password,pic_name,nid_pic) values('$one', '$two','$three','$seven','$four','$five','$six')";
		
		$sql_two= "DELETE FROM precustomer WHERE pcid=$id;";
		
		
	if ($conn->query($sql_one)=== TRUE && $conn->query($sql_two)=== TRUE) {
		header('Location: precustomer.php');
    	 
	} 
	else {
    	echo "Error: " . $sql_one . "<br>" . $conn->error;
	}




?>