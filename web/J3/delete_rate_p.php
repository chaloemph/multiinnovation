<?php

include ('connect.php');

$RATE_P_NUM = $_GET['id'];
$UNIT_CODE_1 = $_GET['id1'];
$ROST_ID = $_GET['id3'];
$ACK_NUM_ID = $_GET['id4'];

if($RATE_P_NUM!=''){

    $sql = "DELETE FROM j3_ratepersonal WHERE RATE_P_NUM ='".$RATE_P_NUM."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>window.location='iframe_unit_ack.php?id=$UNIT_CODE_1&name=$UNIT_CODE_1&nickname=$UNIT_CODE_1&lastname=$UNIT_CODE_1.php'</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn-error;
        
    }
}  

if($ROST_ID!=''){

    $sql = "DELETE FROM j3_rost_approve WHERE ROST_ID ='".$ROST_ID."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>window.location='des_ack.php?id=$ACK_NUM_ID'</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn-error;
        
    }
}  


?>