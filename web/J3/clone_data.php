<?php
    require_once 'connectpdo.php';
   
    $stmt = $db->prepare("SELECT * FROM `j3_ack` WHERE ACK_NUM_ID=:ACK_NUM_ID");
    $stmt->execute(['ACK_NUM_ID' => $_GET["ACK_NUM_ID"]]); 
    $j3_ack = $stmt->fetch();
    $VERSION = $j3_ack["ACK_VERSION"];
    $VERSION = $db->query("SELECT MAX(ACK_VERSION)+1 AS NEW_VERSION FROM `j3_ack` WHERE UNIT_CODE = '".$j3_ack["UNIT_CODE"]."' ")->fetch();
    $VERSION = $VERSION["NEW_VERSION"];
    $ACK_NUM_ID = $j3_ack["ACK_NUM_ID"];


    $sql_insert_into_j3_ack = "INSERT INTO `j3_ack` (`ACK_NUM_ID`, `ACK_ID`, `ACK_MISSION`, `ACK_DISTRIBUTION`, `ACK_ESSENCE`, `ACK_SCOPE`, `ACK_DIVISION`, `ACK_EXPLANATION`, `ACK_SUMMARY`, `ACK_USER`, `ACK_NAME`, `UNIT_CODE`, `UNIT_ACM_ID`, `UNIT_NAME`, `UNIT_NAME_ACK`, `UNIT_CODE_PARENT`, `ACK_TIMESTAMP`, `ACK_STS`, `ACK_VERSION`, `UNIT_ACM_CREATE`) VALUES (NULL, '".$j3_ack["ACK_ID"]."', '".$j3_ack["ACK_MISSION"]."', '".$j3_ack["ACK_DISTRIBUTION"]."', '".$j3_ack["ACK_ESSENCE"]."', '".$j3_ack["ACK_SCOPE"]."', '".$j3_ack["ACK_DIVISION"]."', '".$j3_ack["ACK_EXPLANATION"]."', '".$j3_ack["ACK_SUMMARY"]."', '".$j3_ack["ACK_USER"]."', '".$j3_ack["ACK_NAME"]."', '".$j3_ack["UNIT_CODE"]."', '".$j3_ack["UNIT_ACM_ID"]."', '".$j3_ack["UNIT_NAME"]."', '".$j3_ack["UNIT_NAME_ACK"]."', '".$j3_ack["UNIT_CODE_PARENT"]."', current_timestamp(), '".$j3_ack["ACK_STS"]."', '".$VERSION."', '".$j3_ack["UNIT_ACM_CREATE"]."')";


    $stmt = $db->prepare($sql_insert_into_j3_ack);
    if ($stmt->execute()) {
        $ACK_NUM_ID_LAST = $db->lastInsertId();
    }else {
        print_r($stmt->errorInfo());
        echo $sql_insert_into_j3_ack;
        die();
    }
    


    $sql_select_j3_nrpt_transaction = "SELECT * FROM `j3_nrpt_transaction` WHERE ACK_NUM_ID = '".$ACK_NUM_ID."'  ";
    $data = $db->query($sql_select_j3_nrpt_transaction)->fetchAll();

    foreach($data as $row) {
        $sql_insert_j3_nrpt_transaction = "INSERT INTO `j3_nrpt_transaction` (`TRANSACTION_ID`, `UNIT_CODE`, `NRPT_NAME`, `NRPT_ACM`, `NRPT_NUNIT`, `NRPT_NPAGE`, `NRPT_DMYUPD`, `NRPT_UNIT_PARENT`, `NRPT_USER`, `UNIT_ACM_ID`, `STATUS`, `ACK_NUM_ID`) VALUES (NULL, '".$row["UNIT_CODE"]."', '".$row["NRPT_NAME"]."', '".$row["NRPT_ACM"]."', '".$row["NRPT_NUNIT"]."', '".$row["NRPT_NPAGE"]."', current_timestamp(), '".$row["NRPT_UNIT_PARENT"]."', '".$row["NRPT_USER"]."', '".$row["UNIT_ACM_ID"]."', '1', '".$ACK_NUM_ID_LAST."')";
        $db->query($sql_insert_j3_nrpt_transaction);
    }

    $sql_select_j3_rost_transaction = "SELECT * FROM `j3_rost_transaction` WHERE ACK_NUM_ID = '".$ACK_NUM_ID."'  ";
    $data = $db->query($sql_select_j3_rost_transaction)->fetchAll();

    foreach($data as $row) {
        $sql_insert_j3_rost_transaction = "INSERT INTO `j3_rost_transaction` (`TRANSACTION_ID`, `ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `ACK_NUM_ID`, `STATUS`, `VERSION`) VALUES (NULL, '".$row["ROST_UNIT"]."', '".$row["ROST_CPOS"]."', '".$row["ROST_POSNAME"]."', '".$row["ROST_POSNAME_ACM"]."', '".$row["ROST_RANK"]."', '".$row["ROST_RANKNAME"]."', '".$row["ROST_LAO_MAJ"]."', '".$row["ROST_NCPOS12"]."', '".$row["ROST_ID"]."', '".$row["ROST_PARENT"]."', '".$row["ROST_NUNIT"]."', '".$row["ROST_NPARENT"]."', '".$ACK_NUM_ID_LAST."', '1', '".$VERSION."')";
        $db->query($sql_insert_j3_rost_transaction);
    }

    echo "success";
// ?>