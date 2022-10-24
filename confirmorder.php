<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
?>




<?php 

    include'connection.php';

    $id4 = $_GET["id4"];

    //echo $id3;
    

    $sql="SELECT * FROM currierconfirm WHERE seid = '$id4'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
         while($row = $result->fetch_assoc()) {
           $one = $row["rec_name"];
           $two = $row["rec_phn"];
           $three = $row["rec_pic"];
           $four = $row["pro_pic"];
           $five = $row["carrier_id"];
           $six = $row["sender_id"];
        }
           
    }

    $sql_in= "INSERT INTO confirmorderlist (carrier_id,sender_id,rec_name,rec_phn,rec_pic,pro_pic) values('$five', '$six','$one','$two','$three','$four')";

    $sql_out = "DELETE FROM currierconfirm WHERE seid = '$id4' ";
        
        
    if ($conn->query($sql_in) && $conn->query($sql_out) === TRUE) {
         header('Location: senderConfirmOrder.php');
    } 
    else {
        echo "Error: " . $sql_in . "<br>" . $conn->error;
    }





?>