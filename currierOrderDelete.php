<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
    ?>

<?php  
        include'connection.php';

        $id = $_GET["id"];

        $sql = "DELETE FROM currieractivedetail WHERE caid = '$id' ";
        $result = $conn->query($sql);
        if ($result == true){
        	header('Location: currierOrderDetails.php');
        }else{
        	echo "Something Wrong";
        }


  ?>