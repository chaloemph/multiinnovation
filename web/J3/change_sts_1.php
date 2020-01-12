<?php
include ('connect.php');

$AJY_NUM_ID = $_GET['id2'];
$AJY_NUM_ID_1 = $_GET['id3'];

if($AJY_NUM_ID!=''){

    $sql2 = "UPDATE j3_ajy SET AJY_STS = 'อนุมัติ' WHERE AJY_NUM_ID ='".$AJY_NUM_ID."'";
    
    if($conn->query($sql2)== TRUE){
        echo "<script>window.location='des_ajy.php?id=$AJY_NUM_ID'</script>";
    }else{
        echo "ERROR".$sql2."<BR>".$conn-error;
        
    }
}  

if($AJY_NUM_ID_1!=''){

    $sql3 = "UPDATE j3_ajy SET AJY_STS = 'ไม่อนุมัติ' WHERE AJY_NUM_ID ='".$AJY_NUM_ID_1."'";
    
    if($conn->query($sql3)== TRUE){
        echo "<script>window.location='des_ajy.php?id=$AJY_NUM_ID_1'</script>";
    }else{
        echo "ERROR".$sql3."<BR>".$conn-error;
        
    }
}  
?>