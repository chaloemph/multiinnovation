

<?php

include('connectpdo.php');

require_once 'pdf/vendor/autoload.php';

$ACK_NUM_ID = $_GET['id'];

$sql ="SELECT * FROM j3_ack WHERE ACK_NUM_ID = :ACK_NUM_ID";
$stmt=$db->prepare($sql);
$stmt->bindparam(':ACK_NUM_ID',$ACK_NUM_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$ACK_NUM_ID = $row['ACK_NUM_ID'];
$ACK_ID = $row['ACK_ID'];
$ACK_MISSION = $row['ACK_MISSION'];
$ACK_DISTRIBUTION = $row['ACK_DISTRIBUTION'];
$ACK_ESSENCE = $row['ACK_ESSENCE'];
$ACK_SCOPE = $row['ACK_SCOPE'];
$ACK_DIVISION = $row['ACK_DIVISION'];
$ACK_EXPLANATION = $row['ACK_EXPLANATION'];
$ACK_SUMMARY = $row['ACK_SUMMARY'];
$ACK_USER = $row['ACK_USER'];
$ACK_NAME = $row['ACK_NAME'];
$UNIT_CODE = $row['UNIT_CODE'];
$UNIT_NAME = $row['UNIT_NAME'];
$UNIT_NAME_ACK = $row['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $row['UNIT_CODE_PARENT'];
$ACK_TIMESTAMP = $row['ACK_TIMESTAMP'];
$ACK_STS = $row['ACK_STS'];
$ACK_VERSION = $row['ACK_VERSION'];


$UNIT_NAME = explode(' ', $row['UNIT_NAME']); 
$UNIT_NAME = $UNIT_NAME[0];

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]);	

$html = '<div style="text-align: left">อัตราเฉพาะกิจ</div><div style="text-align:left">หมายเลข '.$ACK_ID.'</div><div style="text-align: center"><u>'.$UNIT_NAME.'</u><div style="text-align: center"> <u>กองบัญชาการกองทัพไทย</u></div><div style="text-align: center">ตอนที่ 1 กล่าวทั่วไป</div></div><br>'; 
$html .= '<div style="text-align:left">1. <u>ภารกิจ</u></div><div>'.$ACK_MISSION.'</div>';
$html .= '<div style="text-align:left">2. <u>การแบ่งมอบ</u> '.$ACK_DISTRIBUTION.' </div>';
$html .= '<div style="text-align:left">3. <u>ขอบเขตความรับผิดชอบและหน้าที่ที่สำคัญ</u> '.$ACK_SCOPE.' </div>';
$html .= '<div style="text-align:left">4. <u>การแบ่งส่วนราชการและหน้าที่</u> '.$ACK_DIVISION.' </div>';
$html .= '<div style="text-align:left">5. <u>ตอนเพิ่มเติม</u><div>ตอนที่ 2 ผังการจัด</div><div>ตอนที่ 3 อัตรากำลังพล</div><div>ตอนที่ 4 คำชี้แจง</div><div>ตอนที่ 5 อัตรายุทโธปกรณ์</div></div>';


$mpdf->WriteHTML($html);
$mpdf->Output();



?>

