
<?php
include('connectpdo.php');

require_once 'pdf/vendor/autoload.php';

$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$ACK_NUM_ID = $_GET['id2'];

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


$sql5 ="SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE";
$stmt5=$db->prepare($sql5);
$stmt5->bindparam(':UNIT_CODE',$UNIT_CODE);
$stmt5->execute();
$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
$data = $row5['UNIT_CODE'];


$UNIT_NAME = explode(' ', $row['UNIT_NAME']); 
$UNIT_NAME = $UNIT_NAME[0];

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]);	


$html ='<div style="text-align: left">อัตราเฉพาะกิจ</div><div style="text-align:left">หมายเลข '.$ACK_ID.'</div><div style="text-align: center"><u>'.$UNIT_NAME.'</u><div style="text-align: center"> <u>กองบัญชาการกองทัพไทย</u></div><div style="text-align: center">ตอนที่ 2 ผังการจัด</div></div><br><br>';
$html .= '<div>
<div class="tf-tree tf-gap-sm">
<ul>
<li>
<span class="tf-nc">
'. $row5['NRPT_ACM'] .'
</span>';

if($data == $UNIT_CODE){

	$sql8 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :data" ;
	$stmt8=$db->prepare($sql8);
	$stmt8->bindparam(':data',$data);
	$stmt8->execute();
	$row8=$stmt8->fetch(PDO::FETCH_ASSOC);

	if($row8['NRPT_UNIT_PARENT'] == $data){
		$html .='<ul>';
		$stmt8->execute();
		while($row8=$stmt8->fetch(PDO::FETCH_ASSOC)){
			$SUB = substr($row8['UNIT_CODE'],4);
			if($SUB != "000001" && $SUB != "000002" && $SUB != "000003" && $SUB != "009999" && $SUB != "009998"  && $SUB != "000900"){
				if($row8['NRPT_UNIT_PARENT'] == $data){
					$send = $row8['UNIT_CODE'];
					$html .= '<li>
					<span class="tf-nc">
					'. $row8['NRPT_ACM'] .'
					</span>';


				}
				$html .= '
				</li>';
			}
		}
	}
	$html .= '</ul>';
}          
$html .= '
</li>
</ul>
</div>
</div>';


$mpdf->WriteHTML($html);
$mpdf->Output();



?>

