<?php
include ('connect.php');

$CREATE_DATE = date("Y-m-d H:i:s");

$AJY_ID = $_POST['AJY_ID'];
$AJY_NAME = $_POST['AJY_NAME'];
$UNIT_CODE = $_POST['UNIT_CODE'];
$UNIT_NAME = $_POST['UNIT_NAME'];
$UNIT_NAME_ACK = $_POST['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $_POST['UNIT_CODE_PARENT'];
$AJY_TIMESTAMP = $_POST['AJY_TIMESTAMP'];
$AJY_ESSENCE = $_POST['AJY_ESSENCE'];
$AJY_USER = $_POST['AJY_USER'];
$AJY_MISSION = $_POST['AJY_MISSION'];
$AJY_GRANT = $_POST['AJY_GRANT'];
$AJY_CAPABILITY = $_POST['AJY_CAPABILITY'];
$AJY_DIS_RATE = $_POST['AJY_DIS_RATE'];
$AJY_CONSUMPTION = $_POST['AJY_CONSUMPTION'];
$AJY_SUMMARY = $_POST['AJY_SUMMARY'];
$AJY_VERSION = $_POST['AJY_VERSION'];
$UNIT_ACM_ID = $_POST['UNIT_ACM_ID'];
$AJY_EXPLAN = $_POST['AJY_EXPLAN'];

//echo "1".$AJY_ACK_MISSION." "."2:".$AJY_ACK_DISTRIBUTION." "."3:".$AJY_ACK_SCOPE." "."4:".$AJY_ACK_DIVISION;



$sql = "INSERT INTO  j3_ajy(AJY_NUM_ID,AJY_ID,AJY_NAME,UNIT_CODE,UNIT_NAME,UNIT_NAME_ACK,UNIT_CODE_PARENT,AJY_TIMESTAMP,		AJY_ESSENCE,AJY_USER,AJY_MISSION,AJY_GRANT,AJY_CAPABILITY,AJY_DIS_RATE,AJY_CONSUMPTION,AJY_SUMMARY,AJY_VERSION,AJY_EXPLAN) 
		VALUES ('','$AJY_ID','$AJY_NAME','$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE_PARENT',
				'$CREATE_DATE','$AJY_ESSENCE','$AJY_USER','$AJY_MISSION','$AJY_GRANT','$AJY_CAPABILITY',
				'$AJY_DIS_RATE','$AJY_CONSUMPTION','$AJY_SUMMARY','$AJY_VERSION','$AJY_EXPLAN')";
$result = mysqli_query($conn, $sql);				 


$sql1 = "INSERT INTO j3_nrpt(UNIT_CODE,NRPT_NAME,NRPT_ACM,NRPT_NUNIT,NRPT_NPAGE,NRPT_DMYUPD,NRPT_UNIT_PARENT,NRPT_USER,UNIT_ACM_ID)
		 VALUES ('$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE','12434','$CREATE_DATE','$UNIT_CODE_PARENT','$AJY_USER','$UNIT_ACM_ID')";
$result1 = mysqli_query($conn, $sql1); 

mysqli_close($conn);

               
              
         if($result && $result1){      
            echo "<script>";
            echo "alert('เพิ่มข้อมูลหมายเลขอัตราการจัดยุทโธปกรณ์เรียบร้อยแล้ว ระบบจะทำการพาท่านไปที่หน้าจัดการข้อมูล');";
            echo "window.location.href='read_ajy.php';";
            echo "</script>";
        }else{
            echo "";
        } 

?>