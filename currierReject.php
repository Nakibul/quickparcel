<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
    ?>

<?php  
        include'connection.php';

        $id2 = $_GET["id2"];

        $sql = "DELETE FROM senderactivity WHERE sid = '$id2' ";
        $result = $conn->query($sql);
        if ($result == true){
        	header('Location: currierRequestedOrders.php');
        }else{
        	echo "Something Wrong";
        }


  ?>