<?php
include 'connect.php';

function trancate($ACK_NUM_ID) {
    $sql = "SELECT * FROM `j3_nrpt_transaction` WHERE ACK_NUM_ID  LIKE '$ACK_NUM_ID '";
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while($row = mysqli_fetch_assoc($query)) {
        $sql_insert_into_j3_rost = "INSERT INTO `j3_rost` (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) VALUES ('".$row["ROST_UNIT"]."', '".$row["ROST_CPOS"]."', '".$row["ROST_POSNAME"]."', '".$row["ROST_POSNAME_ACM"]."', '".$row["ROST_RANK"]."', '".$row["ROST_RANKNAME"]."', '".$row["ROST_LAO_MAJ"]."', ''".$row["ROST_NCPOS12"]."'', '".$row["ROST_ID"]."', ''".$row["ROST_PARENT"]."'', ''".$row["ROST_NUNIT"]."'', ''".$row["ROST_NPARENT"]."'', '1')";

        mysqli_query($conn, $sql_insert_into_j3_rost) or die(mysqli_error($conn));
    }


}

$ACK_NUM_ID = 2;

?>