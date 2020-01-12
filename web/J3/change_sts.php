<?php
include ('connect.php');

$ACK_NUM_ID = $_GET['id'];
$ACK_NUM_ID_1 = $_GET['id1'];



if($ACK_NUM_ID!=''){

    $sql = "UPDATE j3_ack SET ACK_STS = 'อนุมัติ' WHERE ACK_NUM_ID ='".$ACK_NUM_ID."'";
    
    if($conn->query($sql)== TRUE){
        echo "<script>window.location='des_ack.php?id=$ACK_NUM_ID'</script>";
    }else{
        echo "ERROR".$sql."<BR>".$conn-error;
        
    }
}  

if($ACK_NUM_ID_1!=''){

    $sql1 = "UPDATE j3_ack SET ACK_STS = 'ไม่อนุมัติ' WHERE ACK_NUM_ID ='".$ACK_NUM_ID_1."'";
    
    if($conn->query($sql1)== TRUE){
        echo "<script>window.location='des_ack.php?id=$ACK_NUM_ID_1'</script>";
    }else{
        echo "ERROR".$sql1."<BR>".$conn-error;
        
    }
}  







?>