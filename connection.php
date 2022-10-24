<?php

$servername="localhost";
$username="root";
$password="";
$dbname="final_project";


$conn =mysqli_connect($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("$connection faield:" . $conn->connect_error);
}

?>