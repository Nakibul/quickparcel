<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
?>




<?php 

    include'connection.php';

    $id3 = $_GET["id3"];

    //echo $id3;
    

    $sql="SELECT * FROM senderactivity WHERE sid = '$id3'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
         while($row = $result->fetch_assoc()) {
           $one = $row["receiver_name"];
           $two = $row["receiver_phone"];
           $three = $row["receiver_pic"];
           $four = $row["product_pic"];
           $five = $row["carrier_id"];
           $six = $row["sender_id"];
        }
           
    }

    $sql_in= "INSERT INTO currierconfirm (carrier_id,sender_id,rec_name,rec_phn,rec_pic,pro_pic) values('$five', '$six','$one','$two','$three','$four')";

    $sql_out = "DELETE FROM senderactivity WHERE sid = '$id3' ";
        
        
    if ($conn->query($sql_in) && $conn->query($sql_out) === TRUE) {
         header('Location: currierRequestedOrders.php');
    } 
    else {
        echo "Error: " . $sql_in . "<br>" . $conn->error;
    }





?>