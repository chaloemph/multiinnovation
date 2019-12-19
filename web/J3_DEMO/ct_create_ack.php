<?php
include ('connect.php');

$CREATE_DATE = date("Y-m-d H:i:s");

$ACK_ID = $_POST['ACK_ID'];
$ACK_NAME = $_POST['ACK_NAME'];
$UNIT_CODE = $_POST['UNIT_CODE'];
$UNIT_NAME = $_POST['UNIT_NAME'];
$UNIT_NAME_ACK = $_POST['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $_POST['UNIT_CODE_PARENT'];
$ACK_TIMESTAMP = $_POST['ACK_TIMESTAMP'];
$ACK_ESSENCE = $_POST['ACK_ESSENCE'];
$ACK_USER = $_POST['ACK_USER'];
$ACK_MISSION = $_POST['ACK_MISSION'];
$ACK_DISTRIBUTION = $_POST['ACK_DISTRIBUTION'];
$ACK_SCOPE = $_POST['ACK_SCOPE'];
$ACK_DIVISION = $_POST['ACK_DIVISION'];
$ACK_EXPLANATION = $_POST['ACK_EXPLANATION'];
$ACK_SUMMARY = $_POST['ACK_SUMMARY'];
$ACK_VERSION = $_POST['ACK_VERSION'];
$UNIT_ACM_ID = $_POST['UNIT_ACM_ID'];

//echo "1".$AJY_ACK_MISSION." "."2:".$AJY_ACK_DISTRIBUTION." "."3:".$AJY_ACK_SCOPE." "."4:".$AJY_ACK_DIVISION;



$sql1 = "INSERT INTO  j3_ack(ACK_NUM_ID,ACK_ID,ACK_NAME,UNIT_CODE,UNIT_NAME,UNIT_NAME_ACK,UNIT_CODE_PARENT,ACK_TIMESTAMP,		ACK_ESSENCE,ACK_USER,ACK_MISSION,ACK_DISTRIBUTION,ACK_SCOPE,ACK_DIVISION,ACK_EXPLANATION,ACK_SUMMARY,ACK_VERSION) 
		VALUES ('','$ACK_ID','$ACK_NAME','$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE_PARENT',
				'$CREATE_DATE','$ACK_ESSENCE','$ACK_USER','$ACK_MISSION','$ACK_DISTRIBUTION','$ACK_SCOPE',
				'$ACK_DIVISION','$ACK_EXPLANATION','$ACK_SUMMARY','$ACK_VERSION')";
$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());				 


$sql2 = "INSERT INTO j3_nrpt(UNIT_CODE,NRPT_NAME,NRPT_ACM,NRPT_NUNIT,NRPT_NPAGE,NRPT_DMYUPD,NRPT_UNIT_PARENT,NRPT_USER,UNIT_ACM_ID)
		 VALUES ('$UNIT_CODE','$UNIT_NAME','$UNIT_NAME_ACK','$UNIT_CODE','12434','$CREATE_DATE','$UNIT_CODE_PARENT','$ACK_USER','$UNIT_ACM_ID')";
$result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error()); 

mysqli_close($conn);

               
              
         if($result1 && $result2){      
            echo "<script>";
            echo "alert('เพิ่มข้อมูลหมายเลขอัตราเฉพาะกิจเรียบร้อยแล้ว ระบบจะทำการพาท่านไปที่หน้าจัดการข้อมูล');";
            echo "window.location.href='read_ack.php';";
            echo "</script>";
        }else{
            echo "<script type='text/javascript'>";
			echo "alert('error!');";
			echo "window.location = 'create_ack.php'; ";
			echo "</script>";
        } 

?>