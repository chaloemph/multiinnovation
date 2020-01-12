
<?php

include('connectpdo.php');


require_once 'pdf/vendor/autoload.php';

$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

//$ACK_NUM_ID = $_GET['id5'];

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
$UNIT_CODE1 = $row['UNIT_CODE'];
$UNIT_NAME = $row['UNIT_NAME'];
$UNIT_NAME_ACK = $row['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $row['UNIT_CODE_PARENT'];
$ACK_TIMESTAMP = $row['ACK_TIMESTAMP'];
$ACK_STS = $row['ACK_STS'];
$ACK_VERSION = $row['ACK_VERSION'];

$sql_unit ="SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE";
$stmt_unit=$db->prepare($sql_unit);
$stmt_unit->bindparam(':UNIT_CODE',$UNIT_CODE);
$stmt_unit->execute();
$row_unit=$stmt_unit->fetch(PDO::FETCH_ASSOC);
	$UNIT_CODE2 = $row_unit['UNIT_CODE'];
	$NRPT_NAME = $row_unit['NRPT_NAME'];
	$NRPT_ACM = $row_unit['NRPT_ACM'];
	$NRPT_NUNIT = $row_unit['NRPT_NUNIT'];
	$NRPT_NPAGE = $row_unit['NRPT_NPAGE'];
	$NRPT_DMYUPD = $row_unit['NRPT_DMYUPD'];
	$NRPT_UNIT_PARENT = $row_unit['NRPT_UNIT_PARENT'];
	$NRPT_USER = $row_unit['NRPT_USER'];

$sql_pr ="SELECT NRPT_NAME FROM j3_nrpt WHERE UNIT_CODE = :NRPT_UNIT_PARENT";
$stmt_pr=$db->prepare($sql_pr);
$stmt_pr->bindparam(':NRPT_UNIT_PARENT',$NRPT_UNIT_PARENT);
$stmt_pr->execute();
$row_pr=$stmt_pr->fetch(PDO::FETCH_ASSOC);
	$NRPT_NAME2 = $row_pr['NRPT_NAME'];

$NRPT_NAME2 = explode(' ', $row_pr['NRPT_NAME']); 
$NRPT_NAME2 = $NRPT_NAME2[0];	


$NRPT_NAME = explode(' ', $row_unit['NRPT_NAME']); 
$NRPT_NAME = $NRPT_NAME[0];	


$UNIT_NAME = explode(' ', $row['UNIT_NAME']); 
$UNIT_NAME = $UNIT_NAME[0];


$sql2 ="SELECT *,COUNT(ROST_ID) FROM j3_rost 
WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
$stmt2=$db->prepare($sql2);
$stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
$stmt2->execute();
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
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

$html ='<div style="text-align: left">อัตราเฉพาะกิจ</div><div style="text-align:left">หมายเลข '.$ACK_ID.'</div><div style="text-align: center"><u>'.$NRPT_NAME.'</u><div style="text-align: center"><u>'.$NRPT_NAME2.'</u><div style="text-align: center"> <u>กองบัญชาการกองทัพไทย</u></div><div style="text-align: center">ตอนที่ 3 อัตรากำลังพล</div></div><br><br>';
$html .= '<div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>                                                        
                    <tr>
						<th style="text-align: center;">ลำดับ</th>
						<th>ส่วนราชการ/ตำแหน่ง</th>
						<th style="text-align: center;">จำนวน</th>
						<th style="text-align: center;">อัตรากำลังพล</th>
						<th style="text-align: center;">รหัสเลขที่ตำแหน่ง</th>
						<th style="text-align: center;">หมายเหตุ</th>
					</tr>
                </thead>
				<tbody>';

				$i = 00;
				$sql ="SELECT *,COUNT(ROST_ID) FROM j3_rost 
				WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
				GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
				$stmt=$db->prepare($sql);
				$stmt->bindparam(':UNIT_CODE',$UNIT_CODE);
				$stmt->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
				$stmt->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
				$stmt->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
				$stmt->execute();
				while($row1=$stmt->fetch(PDO::FETCH_ASSOC)){
					$COUNT = $row1['COUNT(ROST_ID)'];
					$ROST_UNIT = $row1['ROST_UNIT'];
					$ROST_CPOS = $row1['ROST_CPOS'];
					$ROST_POSNAME = $row1['ROST_POSNAME'];
					$ROST_POSNAME_ACM = $row1['ROST_POSNAME_ACM'];
					$ROST_RANK = $row1['ROST_RANK'];
					$ROST_RANKNAME = $row1['ROST_RANKNAME'];
					$ROST_LAO_MAJ = $row1['ROST_LAO_MAJ'];
					$ROST_NCPOS12 = $row1['ROST_NCPOS12'];
					$ROST_ID = $row1['ROST_ID'];
					$ROST_PARENT = $row1['ROST_PARENT'];
					$ROST_NUNIT = $row1['ROST_NUNIT'];
					$ROST_NPARENT = $row1['ROST_NPARENT'];

					$ROST_POSNAME = explode(' ', $row1['ROST_POSNAME']); 
					$ROST_POSNAME = $ROST_POSNAME[0];

				if($COUNT == "1"){
					$i++;
					$html .= '<tr>
						<td style="width: 20px; text-align: center;">'.$i.'</td>
						<td style="width: 300px; text-align: left;"> 
							'.$ROST_POSNAME.'</td>
						<td style="width: 5px; text-align: center;">';
						if($ROST_RANK == "19" || $ROST_RANK == "29"){
                    		$html .= '-';
                		}elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                    		$html .= ''.$COUNT.'';
                		}           
					$html .='</td>';
					$html .='<td style="width: 150px; text-align: left;">'.$ROST_RANKNAME.'</td>
			 				<td style="width: 180px; text-align: center;">'.$ROST_NCPOS12.'</td>';
		
					$html .='<td style="width: 180px; text-align: center;"></td>
					</tr>';
				}elseif ($COUNT > "1") {
					$i++;
					$html .= '<tr>
						<td style="width: 20px; text-align: center;">'.$i.'</td>
						<td style="width: 300px; text-align: left;"> 
							'.$ROST_POSNAME.'</td>
						<td style="width: 5px; text-align: center;">';
						if($ROST_RANK == "19" || $ROST_RANK == "29"){
                    		$html .= '-';
                		}elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                    		$html .= ''.$COUNT.'';
                		}           
					$html .='</td>';
					$html .='<td style="width: 150px; text-align: left;">'.$ROST_RANKNAME.'</td>
			 				<td style="width: 180px; text-align: center;">'.$ROST_NCPOS12.'</td>';
			 		
					$html .='<td style="width: 180px; text-align: center;"></td>
					</tr>';
				}

				//$i++;
				
				
				/*$sql8 ="SELECT ROST_RANKNAME FROM j1_rank WHERE ROST_RANKNAME = :ROST_RANKNAME";
				$stmt8=$db->prepare($sql8);
				$stmt8->bindparam(':ROST_RANKNAME',$ROST_RANKNAME);
				$stmt8->execute();
				$row8=$stmt8->fetch(PDO::FETCH_ASSOC);
				$ROST_RANKNAME = $row8['ROST_RANKNAME'];*/

		
/*$html .= '<tr>
			<td style="width: 20px; text-align: center;">'.$i.'</td>
			<td style="width: 300px; text-align: left;"> 
			'.$ROST_POSNAME.'</td>
			<td style="width: 5px; text-align: center;">';
				if($ROST_RANK == "19" || $ROST_RANK == "29"){
                    $html .= '-';
                }elseif($ROST_RANK != "19" || $ROST_RANK != "29"){
                    $html .= ''.$COUNT.'';
                }           
	$html .='</td>';
	$html .='<td style="width: 150px; text-align: left;">'.$ROST_RANKNAME.'</td>
			 <td style="width: 180px; text-align: center;">'.$ROST_NCPOS12.'</td>';
		
	$html .='<td style="width: 180px; text-align: center;"></td>
	</tr>';*/
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
