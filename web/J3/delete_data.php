<?php

include ('connect.php');

$id = $_GET['id'];

if($id!=''){

    $sql = "DELETE FROM j3_rateitem WHERE RATE_I_NUM ='".$id."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>window.location='iframe_i_ack.php'</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn-error;
        
    }
}  

$ACK_NUM_ID = $_GET['ACK_NUM_ID'];

if($ACK_NUM_ID!=''){

    $sql1 = "DELETE FROM j3_ack WHERE ACK_NUM_ID ='".$ACK_NUM_ID."'";
    
    if($conn->query($sql1)== TRUE){
        echo "<script>window.location='read_ack.php'</script>";
    }else{
        echo "ERROR".$sql1."<BR>".$conn-error;
        
    }
}  

$AJY_NUM_ID = $_GET['AJY_NUM_ID'];

if($AJY_NUM_ID!=''){

    $sql2 = "DELETE FROM j3_ajy WHERE AJY_NUM_ID ='".$AJY_NUM_ID."'";
    
    if($conn->query($sql2)== TRUE){
        echo "<script>window.location='read_ajy.php'</script>";
    }else{
        echo "ERROR".$sql2."<BR>".$conn-error;
        
    }
}    

?>