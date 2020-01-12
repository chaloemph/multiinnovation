
<?php
include ('connectpdo.php');
include ('connect.php');

//print_r($_POST);
//die();

$CREATE_DATE = date("Y-m-d H:i:s");

$id = $_POST['ACK_NUM_ID'];
$ACK_MISSION = $_POST['ACK_MISSION'];
$ACK_DISTRIBUTION = $_POST['ACK_DISTRIBUTION'];
$ACK_SCOPE = $_POST['ACK_SCOPE'];
$ACK_DIVISION = $_POST['ACK_DIVISION'];
$ACK_EXPLANATION = $_POST['ACK_EXPLANATION'];
$ACK_ID = $_POST['ACK_ID'];
$ACK_NAME = $_POST['ACK_NAME'];
$UNIT_CODE = $_POST['UNIT_CODE'];
$UNIT_NAME = $_POST['UNIT_NAME'];
$UNIT_NAME_ACK = $_POST['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $_POST['UNIT_CODE_PARENT'];
$ACK_SUMMARY = $_POST['ACK_SUMMARY'];
$ACK_ESSENCE = $_POST['ACK_ESSENCE'];
$ACK_USER = $_POST['ACK_USER'];
$UNIT_ACM_ID = $_POST['UNIT_ACM_ID'];

$UNIT_CODE_1 = $_POST['UNIT_CODE_1'];

$sql2 = "SELECT ACK_VERSION FROM j3_ack WHERE ACK_NUM_ID = :id";
$stmt2=$db->prepare($sql2);
$stmt2->bindparam(':id',$id);
$stmt2->execute();
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
$ACK_VERSION = $row2['ACK_VERSION'];
$ACK_VER = $ACK_VERSION + 1;


$sql = "UPDATE j3_nrpt SET 
NRPT_NAME='$UNIT_NAME',
NRPT_ACM = '$UNIT_NAME_ACK',    
NRPT_NUNIT='$UNIT_CODE',
NRPT_NPAGE ='1',
NRPT_DMYUPD='$CREATE_DATE',
NRPT_UNIT_PARENT='$UNIT_CODE_PARENT',
NRPT_USER='$ACK_USER',
UNIT_ACM_ID='$UNIT_ACM_ID'
WHERE UNIT_CODE='$UNIT_CODE_1'";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());	

$sql1 = "INSERT INTO  j3_ack(ACK_NUM_ID,ACK_ID,ACK_NAME,UNIT_CODE,UNIT_NAME,UNIT_NAME_ACK,UNIT_CODE_PARENT,ACK_TIMESTAMP,		ACK_ESSENCE,ACK_USER,ACK_MISSION,ACK_DISTRIBUTION,ACK_SCOPE,ACK_DIVISION,ACK_EXPLANATION,ACK_SUMMARY,ACK_VERSION) 
VALUES ('','$ACK_ID','$ACK_NAME','$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE_PARENT',
'$CREATE_DATE','$ACK_ESSENCE','$ACK_USER','$ACK_MISSION','$ACK_DISTRIBUTION','$ACK_SCOPE',
'$ACK_DIVISION','$ACK_EXPLANATION','$ACK_SUMMARY','$ACK_VER')";

$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 

mysqli_close($conn);
			 

if($result && $result1){      
	echo "<script>";
	echo "window.location.href='read_ack.php';";
	echo "</script>";
}else{
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'create_ack.php'; ";
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