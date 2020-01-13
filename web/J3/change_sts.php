<?php
include ('connect.php');

$ACK_NUM_ID = $_GET['id'];
$sql = "SELECT * FROM `j3_ack` WHERE ACK_NUM_ID = '$ACK_NUM_ID'  ";
$res = mysqli_query($conn,$sql) or die(mysql_error());
$row = mysqli_fetch_assoc($res) ;
$UNIT_ACM_CREATE = $row['UNIT_ACM_CREATE'];
$UNIT_ACM_ID = $row['UNIT_ACM_ID'];
$UNIT_CODE = $row['UNIT_CODE'];
$UNIT_CODE_PARENT = $row['UNIT_CODE_PARENT'];


switch ($UNIT_ACM_CREATE) {
    case 'กรม':
        $sql = "INSERT INTO `j3_nrpt` SELECT * FROM `j3_nrpt_approve` WHERE UNIT_ACM_ID LIKE '$UNIT_CODE'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $sql = "DELETE FROM `j3_nrpt_approve` WHERE UNIT_ACM_ID LIKE '$UNIT_CODE'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $sql = "SELECT * FROM `j3_rost_approve` WHERE SUBSTRING(ROST_UNIT, 1, 4) LIKE '".substr($UNIT_CODE , 0 ,4)."' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $c = 0;
        while( $row = mysqli_fetch_assoc($result)) {
            $sql_set = "UPDATE `j3_rost` SET STATUS = 0 WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            $res = mysqli_query($conn, $sql_set) or die(mysqli_error());

            $ROST_UNIT =  $row["ROST_UNIT"];
            $ROST_CPOS = $row["ROST_CPOS"];
            $ROST_POSNAME = $row["ROST_POSNAME"];
            $ROST_POSNAME_ACM = $row["ROST_POSNAME_ACM"];
            $ROST_RANK = $row["ROST_RANK"];
            $ROST_RANKNAME = $row["ROST_RANKNAME"];
            $ROST_LAO_MAJ = $row["ROST_LAO_MAJ"];
            $ROST_NCPOS12 = $row["ROST_NCPOS12"];
            $ROST_ID = NULL;
            $ROST_PARENT = $row["ROST_PARENT"];
            $ROST_NUNIT = $row["ROST_NUNIT"];
            $ROST_NPARENT = $row["ROST_NPARENT"];
            $STATUS = $row["STATUS"];
            $sql_insert_j3_rost = "INSERT INTO `j3_rost` 
            (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) 
            VALUES ('".$ROST_UNIT."', '".$ROST_CPOS."', '".$ROST_POSNAME."', '".$ROST_POSNAME_ACM."', '".$ROST_RANK."', '".$ROST_RANKNAME."', '".$ROST_LAO_MAJ."', '".$ROST_NCPOS12."',  NULL, '".$ROST_PARENT."', '".$ROST_NUNIT."', '".$ROST_NPARENT."', '".$STATUS."')";
            mysqli_query($conn, $sql_insert_j3_rost) or die(mysqli_error());

            $sql_del = "DELETE FROM `j3_rost_approve` WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            mysqli_query($conn, $sql_del) or die(mysqli_error());
        }
    break;

    case 'สำนัก':

        $sql = "INSERT INTO `j3_nrpt` SELECT * FROM `j3_nrpt_approve` WHERE SUBSTRING(UNIT_CODE, 1, 4) LIKE '".substr($UNIT_CODE , 0, 4)."'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $sql = "DELETE FROM `j3_nrpt_approve` WHERE SUBSTRING(UNIT_CODE, 1, 4) LIKE '".substr($UNIT_CODE , 0, 4)."'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $sql = "SELECT * FROM `j3_rost_approve` WHERE ROST_PARENT LIKE '".$UNIT_CODE."' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $c = 0;
        while( $row = mysqli_fetch_assoc($result)) {
            $sql_set = "UPDATE `j3_rost` SET STATUS = 0 WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            $res = mysqli_query($conn, $sql_set) or die(mysqli_error());

            $ROST_UNIT =  $row["ROST_UNIT"];
            $ROST_CPOS = $row["ROST_CPOS"];
            $ROST_POSNAME = $row["ROST_POSNAME"];
            $ROST_POSNAME_ACM = $row["ROST_POSNAME_ACM"];
            $ROST_RANK = $row["ROST_RANK"];
            $ROST_RANKNAME = $row["ROST_RANKNAME"];
            $ROST_LAO_MAJ = $row["ROST_LAO_MAJ"];
            $ROST_NCPOS12 = $row["ROST_NCPOS12"];
            $ROST_ID = NULL;
            $ROST_PARENT = $row["ROST_PARENT"];
            $ROST_NUNIT = $row["ROST_NUNIT"];
            $ROST_NPARENT = $row["ROST_NPARENT"];
            $STATUS = $row["STATUS"];
            $sql_insert_j3_rost = "INSERT INTO `j3_rost` 
            (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) 
            VALUES ('".$ROST_UNIT."', '".$ROST_CPOS."', '".$ROST_POSNAME."', '".$ROST_POSNAME_ACM."', '".$ROST_RANK."', '".$ROST_RANKNAME."', '".$ROST_LAO_MAJ."', '".$ROST_NCPOS12."',  NULL, '".$ROST_PARENT."', '".$ROST_NUNIT."', '".$ROST_NPARENT."', '".$STATUS."')";
            mysqli_query($conn, $sql_insert_j3_rost) or die(mysqli_error());

            $sql_del = "DELETE FROM `j3_rost_approve` WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            mysqli_query($conn, $sql_del) or die(mysqli_error());
        }
    break;

    case 'ศูนย์':

        $sql = "INSERT INTO `j3_nrpt` SELECT * FROM `j3_nrpt_approve` WHERE SUBSTRING(UNIT_CODE, 1,5) LIKE '".substr($UNIT_CODE , 0, 5)."'  ";  
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $sql = "DELETE FROM `j3_nrpt_approve` WHERE SUBSTRING(UNIT_CODE, 1, 5) LIKE '".substr($UNIT_CODE , 0, 5)."'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $sql = "SELECT * FROM `j3_rost_approve` WHERE ROST_NUNIT LIKE '".$UNIT_CODE."' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $c = 0;
        while( $row = mysqli_fetch_assoc($result)) {
            $sql_set = "UPDATE `j3_rost` SET STATUS = 0 WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            $res = mysqli_query($conn, $sql_set) or die(mysqli_error());

            $ROST_UNIT =  $row["ROST_UNIT"];
            $ROST_CPOS = $row["ROST_CPOS"];
            $ROST_POSNAME = $row["ROST_POSNAME"];
            $ROST_POSNAME_ACM = $row["ROST_POSNAME_ACM"];
            $ROST_RANK = $row["ROST_RANK"];
            $ROST_RANKNAME = $row["ROST_RANKNAME"];
            $ROST_LAO_MAJ = $row["ROST_LAO_MAJ"];
            $ROST_NCPOS12 = $row["ROST_NCPOS12"];
            $ROST_ID = NULL;
            $ROST_PARENT = $row["ROST_PARENT"];
            $ROST_NUNIT = $row["ROST_NUNIT"];
            $ROST_NPARENT = $row["ROST_NPARENT"];
            $STATUS = $row["STATUS"];
            $sql_insert_j3_rost = "INSERT INTO `j3_rost` 
            (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) 
            VALUES ('".$ROST_UNIT."', '".$ROST_CPOS."', '".$ROST_POSNAME."', '".$ROST_POSNAME_ACM."', '".$ROST_RANK."', '".$ROST_RANKNAME."', '".$ROST_LAO_MAJ."', '".$ROST_NCPOS12."',  NULL, '".$ROST_PARENT."', '".$ROST_NUNIT."', '".$ROST_NPARENT."', '".$STATUS."')";
            mysqli_query($conn, $sql_insert_j3_rost) or die(mysqli_error());

            $sql_del = "DELETE FROM `j3_rost_approve` WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            mysqli_query($conn, $sql_del) or die(mysqli_error());
        }
    break;

    case 'กอง':

        $sql = "INSERT INTO `j3_nrpt` SELECT * FROM `j3_nrpt_approve` WHERE  SUBSTRING(UNIT_CODE, 1,8) LIKE '".substr($UNIT_CODE , 0, 8)."'  ";  
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $sql = "DELETE FROM `j3_nrpt_approve` WHERE  SUBSTRING(UNIT_CODE, 1,8) LIKE '".substr($UNIT_CODE , 0, 8)."'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $sql = "SELECT * FROM `j3_rost_approve` WHERE ROST_NPARENT LIKE '".$UNIT_CODE."' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $c = 0;
        while( $row = mysqli_fetch_assoc($result)) {
            $sql_set = "UPDATE `j3_rost` SET STATUS = 0 WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            $res = mysqli_query($conn, $sql_set) or die(mysqli_error());

            $ROST_UNIT =  $row["ROST_UNIT"];
            $ROST_CPOS = $row["ROST_CPOS"];
            $ROST_POSNAME = $row["ROST_POSNAME"];
            $ROST_POSNAME_ACM = $row["ROST_POSNAME_ACM"];
            $ROST_RANK = $row["ROST_RANK"];
            $ROST_RANKNAME = $row["ROST_RANKNAME"];
            $ROST_LAO_MAJ = $row["ROST_LAO_MAJ"];
            $ROST_NCPOS12 = $row["ROST_NCPOS12"];
            $ROST_ID = NULL;
            $ROST_PARENT = $row["ROST_PARENT"];
            $ROST_NUNIT = $row["ROST_NUNIT"];
            $ROST_NPARENT = $row["ROST_NPARENT"];
            $STATUS = $row["STATUS"];
            $sql_insert_j3_rost = "INSERT INTO `j3_rost` 
            (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) 
            VALUES ('".$ROST_UNIT."', '".$ROST_CPOS."', '".$ROST_POSNAME."', '".$ROST_POSNAME_ACM."', '".$ROST_RANK."', '".$ROST_RANKNAME."', '".$ROST_LAO_MAJ."', '".$ROST_NCPOS12."',  NULL, '".$ROST_PARENT."', '".$ROST_NUNIT."', '".$ROST_NPARENT."', '".$STATUS."')";
            mysqli_query($conn, $sql_insert_j3_rost) or die(mysqli_error());

            $sql_del = "DELETE FROM `j3_rost_approve` WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            mysqli_query($conn, $sql_del) or die(mysqli_error());
        }
    break;

    case 'แผนก':

        $sql = "INSERT INTO `j3_nrpt` SELECT * FROM `j3_nrpt_approve` WHERE  SUBSTRING(UNIT_CODE, 1,10) LIKE '".substr($UNIT_CODE , 0, 10)."'  ";  
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $sql = "DELETE FROM `j3_nrpt_approve` WHERE  SUBSTRING(UNIT_CODE, 1,10) LIKE '".substr($UNIT_CODE , 0, 10)."'  ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $sql = "SELECT * FROM `j3_rost_approve` WHERE ROST_UNIT LIKE '".$UNIT_CODE."' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());
        $c = 0;
        while( $row = mysqli_fetch_assoc($result)) {
            $sql_set = "UPDATE `j3_rost` SET STATUS = 0 WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            $res = mysqli_query($conn, $sql_set) or die(mysqli_error());

            $ROST_UNIT =  $row["ROST_UNIT"];
            $ROST_CPOS = $row["ROST_CPOS"];
            $ROST_POSNAME = $row["ROST_POSNAME"];
            $ROST_POSNAME_ACM = $row["ROST_POSNAME_ACM"];
            $ROST_RANK = $row["ROST_RANK"];
            $ROST_RANKNAME = $row["ROST_RANKNAME"];
            $ROST_LAO_MAJ = $row["ROST_LAO_MAJ"];
            $ROST_NCPOS12 = $row["ROST_NCPOS12"];
            $ROST_ID = NULL;
            $ROST_PARENT = $row["ROST_PARENT"];
            $ROST_NUNIT = $row["ROST_NUNIT"];
            $ROST_NPARENT = $row["ROST_NPARENT"];
            $STATUS = $row["STATUS"];
            $sql_insert_j3_rost = "INSERT INTO `j3_rost` 
            (`ROST_UNIT`, `ROST_CPOS`, `ROST_POSNAME`, `ROST_POSNAME_ACM`, `ROST_RANK`, `ROST_RANKNAME`, `ROST_LAO_MAJ`, `ROST_NCPOS12`, `ROST_ID`, `ROST_PARENT`, `ROST_NUNIT`, `ROST_NPARENT`, `STATUS`) 
            VALUES ('".$ROST_UNIT."', '".$ROST_CPOS."', '".$ROST_POSNAME."', '".$ROST_POSNAME_ACM."', '".$ROST_RANK."', '".$ROST_RANKNAME."', '".$ROST_LAO_MAJ."', '".$ROST_NCPOS12."',  NULL, '".$ROST_PARENT."', '".$ROST_NUNIT."', '".$ROST_NPARENT."', '".$STATUS."')";
            mysqli_query($conn, $sql_insert_j3_rost) or die(mysqli_error());

            $sql_del = "DELETE FROM `j3_rost_approve` WHERE ROST_ID = '".$row["ROST_ID"]."'  ";
            mysqli_query($conn, $sql_del) or die(mysqli_error());
        }

    break;
    
}


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