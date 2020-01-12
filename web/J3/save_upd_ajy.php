<?php
include ('connectpdo.php');
include ('connect.php');

//print_r($_POST);
//die();

$CREATE_DATE = date("Y-m-d H:i:s");

$id = $_POST['AJY_NUM_ID'];
$AJY_MISSION = $_POST['AJY_MISSION'];
$AJY_GRANT = $_POST['AJY_GRANT'];
$AJY_CAPABILITY = $_POST['AJY_CAPABILITY'];
$AJY_DIS_RATE = $_POST['AJY_DIS_RATE'];
$AJY_CONSUMPTION = $_POST['AJY_CONSUMPTION'];
$AJY_ID = $_POST['AJY_ID'];
$AJY_NAME = $_POST['AJY_NAME'];
$UNIT_CODE = $_POST['UNIT_CODE'];
$UNIT_NAME = $_POST['UNIT_NAME'];
$UNIT_NAME_ACK = $_POST['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $_POST['UNIT_CODE_PARENT'];
$AJY_SUMMARY = $_POST['AJY_SUMMARY'];
$AJY_ESSENCE = $_POST['AJY_ESSENCE'];
$AJY_USER = $_POST['AJY_USER'];
$UNIT_ACM_ID = $_POST['UNIT_ACM_ID'];
$UNIT_CODE_1 = $_POST['UNIT_CODE_1'];
$AJY_EXPLAN = $_POST['AJY_EXPLAN'];

$sql2 = "SELECT AJY_VERSION FROM j3_ajy WHERE AJY_NUM_ID = :id";
$stmt2=$db->prepare($sql2);
$stmt2->bindparam(':id',$id);
$stmt2->execute();
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
	$AJY_VERSION = $row2['AJY_VERSION'];
	$AJY_VER = $AJY_VERSION + 1;


$sql = "UPDATE j3_nrpt SET 
NRPT_NAME='$UNIT_NAME',
NRPT_ACM = '$UNIT_NAME_ACK',    
NRPT_NUNIT='$UNIT_CODE',
NRPT_NPAGE ='1',
NRPT_DMYUPD='$CREATE_DATE',
NRPT_UNIT_PARENT='$UNIT_CODE_PARENT',
NRPT_USER='$AJY_USER',
UNIT_ACM_ID='$UNIT_ACM_ID'
WHERE UNIT_CODE='$UNIT_CODE_1'";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());	

$sql1 = "INSERT INTO  j3_ajy(AJY_NUM_ID,AJY_MISSION,AJY_GRANT,AJY_CAPABILITY,AJY_DIS_RATE,AJY_CONSUMPTION,AJY_EXPLAN,AJY_SUMMARY,	AJY_ID,AJY_NAME,UNIT_CODE,UNIT_NAME,UNIT_NAME_ACK,UNIT_CODE_PARENT,AJY_TIMESTAMP,AJY_ESSENCE,AJY_USER,AJY_VERSION) 
VALUES ('','$AJY_MISSION','$AJY_GRANT','$AJY_CAPABILITY','$AJY_DIS_RATE','$AJY_CONSUMPTION','$AJY_EXPLAN',
'$AJY_SUMMARY','$AJY_ID','$AJY_NAME','$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE_PARENT','$CREATE_DATE','$AJY_ESSENCE','$AJY_USER','$AJY_VER')";

$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 

mysqli_close($conn);
			 

if($result && $result1){      
	echo "<script>";
	echo "window.location.href='read_ajy.php';";
	echo "</script>";
}else{
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'create_ajy.php'; ";
	echo "</script>";
} 

//echo $sql; 



/*if($conn->query($sql)==TRUE){      
	echo "แก้ไขข้อมูลเสร็จเรียบร้อย ระบบจะย้อนกลับไปหน้าแสดงข้อมูลอัติโนมัติ";
	header('location: read_ack.php');
}else{
	echo "ERROR".$sql."<BR>".$conn->error;
}*/

?>