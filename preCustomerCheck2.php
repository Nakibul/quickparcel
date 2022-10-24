<?php

include'connection.php';
include'precustomer.php';

$id = $_GET["id"];


		
		$sql_three= "DELETE FROM precustomer WHERE pcid=$id;";
		
		
	if ($conn->query($sql_three)=== TRUE) {
    	 header('Location: precustomer.php');
	} 
	else {
    	echo "Error: " . $sql_three . "<br>" . $conn->error;
	}


?>