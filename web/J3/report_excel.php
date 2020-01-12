<?php  
//export.php  
include ('connectpdo.php');

$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$output = '';
if(isset($_POST["export"]))
{
	$query = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
	WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
	GROUP BY ROST_POSNAME_ACM,ROST_RANKNAME ORDER BY ROST_ID";
	$stmt=$db->prepare($sql);
	$stmt->bindparam(':UNIT_CODE',$UNIT_CODE);
	$stmt->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
	$stmt->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
	$stmt->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
	$stmt->execute();
	$i = 0;
	if($stmt=$db->prepare($sql) > 0)
	{
		$output .= '
		<table class="table" bordered="1">  
		<tr>  
		<th>ลำดับ</th>  
		<th>ส่วนราชการ/ตำแหน่ง</th>  
		<th>จำนวน</th>  
		<th>อัตรากำลังพล</th>
		<th>รหัสเลขที่ตำแหน่ง</th>
		</tr>
		';
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			$COUNT = $row['COUNT(ROST_ID)'];
			$ROST_UNIT = $row['ROST_UNIT'];
			$ROST_CPOS = $row['ROST_CPOS'];
			$ROST_POSNAME = $row['ROST_POSNAME'];
			$ROST_POSNAME_ACM = $row['ROST_POSNAME_ACM'];
			$ROST_RANK = $row['ROST_RANK'];
			$ROST_RANKNAME = $row['ROST_RANKNAME'];
			$ROST_LAO_MAJ = $row['ROST_LAO_MAJ'];
			$ROST_NCPOS12 = $row['ROST_NCPOS12'];
			$ROST_ID = $row['ROST_ID'];
			$ROST_PARENT = $row['ROST_PARENT'];
			$ROST_NUNIT = $row['ROST_NUNIT'];
			$ROST_NPARENT = $row['ROST_NPARENT'];
			$i++
			$output .= '
			<tr>  
			<td>'.$i.'</td>  
			<td>'.$row["ROST_POSNAME"].'</td>  
			<td>'.$row["COUNT(ROST_ID)"].'</td>  
			<td>'.$row["ROST_RANKNAME"].'</td>  
			<td>'.$row["ROST_NCPOS12"].'</td>
			</tr>
			';
		}
		$output .= '</table>';
		header('Content-Type: application/xls');
		header('Content-Disposition: attachment; filename=download.xls');
		echo $output;
	}
}
?>
