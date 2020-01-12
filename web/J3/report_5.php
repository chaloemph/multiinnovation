
<?php

include('connectpdo.php');


require_once 'pdf/vendor/autoload.php';


$ACK_NUM_ID = $_GET['id'];

$sql4 ="SELECT * FROM j3_ack WHERE ACK_NUM_ID = :ACK_NUM_ID";
				$stmt4=$db->prepare($sql4);
				$stmt4->bindparam(':ACK_NUM_ID',$ACK_NUM_ID);
				$stmt4->execute();
				$row4=$stmt4->fetch(PDO::FETCH_ASSOC);
				$ACK_NUM_ID = $row4['ACK_NUM_ID'];
				$ACK_ID = $row4['ACK_ID'];
				$ACK_MISSION = $row4['ACK_MISSION'];
				$ACK_DISTRIBUTION = $row4['ACK_DISTRIBUTION'];
				$ACK_ESSENCE = $row4['ACK_ESSENCE'];
				$ACK_SCOPE = $row4['ACK_SCOPE'];
				$ACK_DIVISION = $row4['ACK_DIVISION'];
				$ACK_EXPLANATION = $row4['ACK_EXPLANATION'];
				$ACK_SUMMARY = $row4['ACK_SUMMARY'];
				$ACK_USER = $row4['ACK_USER'];
				$ACK_NAME = $row4['ACK_NAME'];
				$UNIT_CODE = $row4['UNIT_CODE'];
				$UNIT_NAME = $row4['UNIT_NAME'];
				$UNIT_NAME_ACK = $row4['UNIT_NAME_ACK'];
				$UNIT_CODE_PARENT = $row4['UNIT_CODE_PARENT'];
				$ACK_TIMESTAMP = $row4['ACK_TIMESTAMP'];
				$ACK_STS = $row4['ACK_STS'];
				$ACK_VERSION = $row4['ACK_VERSION'];


				$UNIT_NAME = explode(' ', $row4['UNIT_NAME']); 
				$UNIT_NAME = $UNIT_NAME[0];


				$sql5 ="SELECT * FROM j3_rateitem WHERE ACK_ID = :ACK_ID";
				$stmt5=$db->prepare($sql5);
				$stmt5->bindparam(':ACK_ID',$ACK_ID);
				$stmt5->execute();
				$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
				$RATE_I_NUM = $row5['RATE_I_NUM'];
														$ACK_ID_1 = $row5['ACK_ID'];
														$RATE_I_NUM_POS = $row5['RATE_I_NUM_POS'];
														$NSN_ID = $row5['NSN_ID'];
														$NSN_NAME = $row5['NSN_NAME'];
														$RATE_I_TOTAL = $row5['RATE_I_TOTAL'];
														$RATE_I_REMARK = $row5['RATE_I_REMARK'];
														$P_ID = $row5['P_ID'];
														$RATE_I_UPD_DATE = $row5['RATE_I_UPD_DATE'];
														$RATE_I_DEPARTMENT = $row5['RATE_I_DEPARTMENT'];
/*while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
	$COUNT = $row2['COUNT(ROST_ID)'];
	$ROST_UNIT = $row2['ROST_UNIT'];
	$ROST_CPOS = $row2['ROST_CPOS'];
	$ROST_POSNAME = $row2['ROST_POSNAME'];
	$ROST_POSNAME_ACM = $row2['ROST_POSNAME_ACM'];
	$ROST_RANK = $row2['ROST_RANK'];
	$ROST_RANKNAME = $row2['ROST_RANKNAME'];
	$ROST_LAO_MAJ = $row2['ROST_LAO_MAJ'];
	$ROST_NCPOS12 = $row2['ROST_NCPOS12'];
	$ROST_ID = $row2['ROST_ID'];
	$ROST_PARENT = $row2['ROST_PARENT'];
	$ROST_NUNIT = $row2['ROST_NUNIT'];
	$ROST_NPARENT = $row2['ROST_NPARENT'];
}*/

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]);	

$html ='<div style="text-align: left">อัตราเฉพาะกิจ</div><div style="text-align:left">หมายเลข '.$ACK_ID.'</div><div style="text-align: center"><u>'.$UNIT_NAME.'</u><div style="text-align: center"> <u>กองบัญชาการกองทัพไทย</u></div><div style="text-align: center">ตอนที่ 5 อัตรายุทโธปกรณ์</div></div><br><br>';
$html .= '<div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>                                                        
                    	<tr>
														<th>หมายเลขสิ่งอุปกรณ์</th>
														<th>ชื่อสิ่งอุปกรณ์</th>
														<th style="text-align: center;">จำนวน</th>
														<th style="text-align: center;">หน่วยงานที่รับผิดชอบ</th>
														<th style="text-align: center;">หมายเหตุ</th>
						</tr>
                </thead>
				<tbody>';
				$sql ="SELECT * FROM j3_ack WHERE ACK_NUM_ID = :ACK_NUM_ID";
				$stmt=$db->prepare($sql);
				$stmt->bindparam(':ACK_NUM_ID',$ACK_NUM_ID);
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
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


				$sql2 ="SELECT * FROM j3_rateitem WHERE ACK_ID = :ACK_ID";
				$stmt2=$db->prepare($sql2);
				$stmt2->bindparam(':ACK_ID',$ACK_ID);
				$stmt2->execute();
				$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
				$RATE_I_NUM = $row2['RATE_I_NUM'];
														$ACK_ID = $row2['ACK_ID'];
														$RATE_I_NUM_POS = $row2['RATE_I_NUM_POS'];
														$NSN_ID = $row2['NSN_ID'];
														$NSN_NAME = $row2['NSN_NAME'];
														$RATE_I_TOTAL = $row2['RATE_I_TOTAL'];
														$RATE_I_REMARK = $row2['RATE_I_REMARK'];
														$P_ID = $row2['P_ID'];
														$RATE_I_UPD_DATE = $row2['RATE_I_UPD_DATE'];
														$RATE_I_DEPARTMENT = $row2['RATE_I_DEPARTMENT'];
		
$html .= '<tr>
			<td style="width: 180px; text-align: center;">'.$NSN_ID.'</td>
			<td style="width: 300px;"> '.$NSN_NAME.'</td>
			<td style="width: 100px; text-align: center;">'.$RATE_I_TOTAL.'</td>
            <td style="width: 50px; text-align: center;">'.$RATE_I_DEPARTMENT.'</td>
            <td style="width: 200px; text-align: center;">'.$RATE_I_REMARK.'</td>';
			}
	$html .='</tbody>
    </table>
</div>';
$html .= "<style>
table, td, th {  
  border: 1px solid #0000;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 2px;
}
</style>";

$mpdf->WriteHTML($html);
$mpdf->Output();



?>
