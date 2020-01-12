<?php

include ('connectpdo.php');


$ACK_ID = $_POST['ACK_ID'];
$RATE_I_NUM_POS = $_POST['RATE_I_NUM_POS'];
$NSN_ID = $_POST['NSN_ID'];
$NSN_NAME = $_POST['NSN_NAME'];
$RATE_I_TOTAL = $_POST['RATE_I_TOTAL'];
$RATE_I_REMARK = $_POST['RATE_I_REMARK'];
$P_ID = $_POST['P_ID'];
$RATE_I_UPD_DATE = $_POST['RATE_I_UPD_DATE'];
$RATE_I_DEPARTMENT = $_POST['RATE_I_DEPARTMENT'];


/*$AJY_ACK_ID = "2";
$RATE_P_N_POS = "2";
$RATE_P_RANK = "4";
$POSITION_ID = "5";
$RATE_P_PILE = "6";
$RATE_P_THESE = "7";
$SALARY_ID = "8";
$EXPERT_MIL_ID = "9";
$RATE_P_NUMBER = "10";
$RATE_P_REMARK = "11";*/

//echo "1".$ACK_ID." "."2:".$RATE_I_NUM_POS." "."3:".$NSN_ID." "."4:".$NSN_NAME." "."5:".$RATE_I_TOTAL." "."6:".$RATE_I_REMARK." "."7:".$P_ID." "."8".$RATE_I_UPD_DATE." "."3:".$RATE_I_DEPARTMENT." "."3:".$RATE_I_NUMBER;

$sql = "INSERT INTO j3_rateitem(RATE_I_NUM,ACK_ID,RATE_I_NUM_POS,NSN_ID,NSN_NAME,RATE_I_TOTAL,RATE_I_REMARK,P_ID,RATE_I_UPD_DATE,RATE_I_DEPARTMENT)
		VALUES ('',:ACK_ID,:RATE_I_NUM_POS,:NSN_ID,:NSN_NAME,:RATE_I_TOTAL,:RATE_I_REMARK,:P_ID,:RATE_I_UPD_DATE,:RATE_I_DEPARTMENT)";

$stmt=$db->prepare($sql);
$stmt->bindparam(':ACK_ID',$ACK_ID);
$stmt->bindparam(':RATE_I_NUM_POS',$RATE_I_NUM_POS);
$stmt->bindparam(':NSN_ID',$NSN_ID);
$stmt->bindparam(':NSN_NAME',$NSN_NAME);
$stmt->bindparam(':RATE_I_TOTAL',$RATE_I_TOTAL);
$stmt->bindparam(':RATE_I_REMARK',$RATE_I_REMARK);
$stmt->bindparam(':P_ID',$P_ID);
$stmt->bindparam(':RATE_I_UPD_DATE',$RATE_I_UPD_DATE);
$stmt->bindparam(':RATE_I_DEPARTMENT',$RATE_I_DEPARTMENT);
$stmt->execute();


//echo "ID".$AJY_ACK_ID." "."RATE_P:".$RATE_P_N_POS." "."51253545:".$RATE_P_RANK;
//echo $AJY_ACK_ID;
echo "<script>window.location='iframe_i_ack.php'</script>";

?>