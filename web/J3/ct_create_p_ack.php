<?php

include ('connectpdo.php');


$ACK_ID = $_POST['ACK_ID'];
$RATE_P_N_POS = $_POST['RATE_P_N_POS'];
$RATE_P_RANK = $_POST['RATE_P_RANK'];
$POSITION_ID = $_POST['POSITION_ID'];
$RATE_P_PILE = $_POST['RATE_P_PILE'];
$SALARY_ID = $_POST['SALARY_ID'];
$EXPERT_MIL_ID = $_POST['EXPERT_MIL_ID'];
$RATE_P_NUMBER = $_POST['RATE_P_NUMBER'];
$RATE_P_REMARK = $_POST['RATE_P_REMARK'];

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

$sql = "INSERT INTO j3_ratepersonal(RATE_P_NUM,ACK_ID,RATE_P_N_POS,RATE_P_RANK,POSITION_ID,RATE_P_PILE,SALARY_ID,EXPERT_MIL_ID,RATE_P_NUMBER,RATE_P_REMARK) "
. "VALUES('',:ACK_ID,:RATE_P_N_POS,:RATE_P_RANK,:POSITION_ID,:RATE_P_PILE,:SALARY_ID,:EXPERT_MIL_ID,:RATE_P_NUMBER,:RATE_P_REMARK)";

$stmt=$db->prepare($sql);
$stmt->bindparam(':ACK_ID',$ACK_ID);
$stmt->bindparam(':RATE_P_N_POS',$RATE_P_N_POS);
$stmt->bindparam(':RATE_P_RANK',$RATE_P_RANK);
$stmt->bindparam(':POSITION_ID',$POSITION_ID);
$stmt->bindparam(':RATE_P_PILE',$RATE_P_PILE);
$stmt->bindparam(':SALARY_ID',$SALARY_ID);
$stmt->bindparam(':EXPERT_MIL_ID',$EXPERT_MIL_ID);
$stmt->bindparam(':RATE_P_NUMBER',$RATE_P_NUMBER);
$stmt->bindparam(':RATE_P_REMARK',$RATE_P_REMARK);
$stmt->execute();

//echo "ID".$AJY_ACK_ID." "."RATE_P:".$RATE_P_N_POS." "."51253545:".$RATE_P_RANK;
//echo $AJY_ACK_ID;
echo "<script>window.location='iframe_p_ack.php'</script>";

?>