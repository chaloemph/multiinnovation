<?php

include ('connectpdo.php');

$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$sql ="SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE";
$stmt=$db->prepare($sql);
$stmt->bindparam(':UNIT_CODE',$UNIT_CODE);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$UNIT_CODE = $row['UNIT_CODE'];
	$NRPT_NAME = $row['NRPT_NAME'];
	$NRPT_ACM = $row['NRPT_ACM'];
	$NRPT_NUNIT = $row['NRPT_NUNIT'];
	$NRPT_NPAGE = $row['NRPT_NPAGE'];
	$NRPT_DMYUPD = $row['NRPT_DMYUPD'];
	$NRPT_UNIT_PARENT = $row['NRPT_UNIT_PARENT'];
	$NRPT_USER = $row['NRPT_USER'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php
		include ('haed.php');
	?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
      		include ('sidebar.php');
    	?>

        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <section class="content">
                        <div class="container-fluid">
                            <form action="detail_ack.php" method="POST">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <div style="text-vlign: center;">
                                            <div class="row">
                                                <label style="text-vlign: center;">หมายเลขอัตราเฉพาะกิจ :</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="ACK_ID" readonly>
                                                </div>
                                                &nbsp;
                                                <label>หมายเลข :</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="ACK_ID" readonly>
                                                </div>
                                                &nbsp;
                                                <label>ว/ด/ป อนุมัติ :</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="ACK_ID" readonly>
                                                </div>
                                                &nbsp;
                                                <label>อสอ. :</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="ACK_ID" readonly>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <label>นามหน่วยเต็ม</label>
                                                    <input type="text" class="form-control" name="ACK_ID">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <label>นามหน่วยย่อ</label>
                                                    <input type="text" class="form-control" name="ACK_NAME">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <label>จว.ที่ตั้ง</label>
                                                    <input type="text" class="form-control" name="UNIT_CODE">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <label>ว/ด/ป อนุมัติ</label>
                                                    <input type="text" class="form-control" name="UNIT_NAME">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <label>รหัสหน่วย</label>
                                                    <input type="text" class="form-control" name="UNIT_CODE_PARENT"
                                                        value="<?=$UNIT_CODE?>" readonly>
                                                </div>
                                            </div>
                                            <input type="hidden" name="UNIT_ACM_ID" value="<?=$UNIT_ACM_ID?>">
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <label>รหัสหน่วยกรมบัญชีกลาง</label>
                                                    <input type="text" class="form-control" name="ACK_ESSENCE">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <label>วัน-เวลา ณ ทำรายการล่าสุด</label>
                                                    <input type="text" class="form-control" name="ACK_TIMESTAMP"
                                                        value="<?=date('d/m/Y H:i:s') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-2">
                                                <div class="form-group">
                                                    <label>ผู้ทำรายการ</label>
                                                    <input type="text" class="form-control" name="ACK_USER">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-1">
                                                <div class="form-group">
                                                    <label>เวอร์ชัน</label>
                                                    <input type="text" class="form-control" name="ACK_VERSION" value="1" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </from>
                        </div>
                    </section>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-info">                                                        
                            <tr>
                                <th style="text-align: center;">ประเภท</th>
                                <th style="text-align: center;">สัญญาบัตร</th>
                                <th style="text-align: center;">ประทวน</th>
                                <th style="text-align: center;">พลอาสาสมัคร</th>
                                <th style="text-align: center;">พลทหาร</th>
                                <th style="text-align: center;">ลูกจ้างประจำ</th>
                                <th style="text-align: center;">พนักงานราชการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include ('connectpdo.php');
                                    $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                        WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                        GROUP BY ROST_POSNAME_ACM ORDER BY ROST_ID";
                                    $stmt2=$db->prepare($sql2);
                                    $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                    $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                    $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                    $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                    $stmt2->execute();
                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                    }
                                            //SELECT COUNT(`ROST_ID`),`ROST_POSNAME_ACM` FROM `j3_rost` GROUP BY `ROST_POSNAME_ACM` ORDER BY `ROST_ID`
                                            /*$sql3 = "SELECT * FROM j3_rost 
                                                    WHERE ROST_NCPOS12 = :ROST_NCPOS12 ";
                                            $stmt3=$db->prepare($sql3);
                                            $stmt3->bindparam(':ROST_NCPOS12',$ROST_NCPOS12);
                                            $stmt3->execute();
                                            while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
                                            $N_NCPOS12 = $row3['ROST_NCPOS12'];*/
                            ?>
                            <tr>
                                <tr>
                                    <th class="bg-info" style="width: 100px; text-align: center;">อัตราเต็ม</th>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                </tr>
                                <tr>
                                    <th class="bg-info" style="width: 100px; text-align: center;">อัตราอนุมัติ</th>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                </tr>
                                <tr>
                                    <th class="bg-info" style="width: 100px; text-align: center;">บรรจุจริง</th>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                    <td style="width: 100px; text-align: center;">อัตราเต็ม</td>
                                </tr>
                            </tr>                                                         
                        </tbody>
                    </table>
                </div>
				<div class="card-body">
                    <button class="tablink" onmouseover="openPage('Home1', this, 'white')">
                        <font style="font-weight: bold; font-size: 18px;">นามหน่วยถือทำเนียบ</font>
                    </button>
                    <button class="tablink" onmouseover="openPage('Sturc1', this, 'white')">
                        <font style="font-weight: bold; font-size: 18px;">นานหน่วยพิมพ์</font>
                    </button>
                    <button class="tablink" onmouseover="openPage('News1', this, 'white')">
                        <font style="font-weight: bold; font-size: 18px;">ทำเนียบกำลังพล</font>
                    </button>

					<div id="Home1" class="tabcontent">
                    <div class="card-body">
    <section class="content">
		<div class="container-fluid">
			<form action="detail_ack.php" method="POST">
				<div class="card card-default">
					<div class="card-header">
						<div style="text-align: center;">
							<div class="row">
								<label>หมายเลขอัตราเฉพาะกิจ :</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="ACK_ID" readonly>
								</div>
								&nbsp;
								<label>หมายเลข :</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="ACK_ID" readonly>
								</div>
								&nbsp;
								<label>ว/ด/ป อนุมัติ :</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="ACK_ID" readonly>
								</div>
								&nbsp;
								<label>อสอ. :</label>
								<div class="col-md-2">
									<input type="text" class="form-control" name="ACK_ID" readonly>
								</div>	
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-sm-5">
								<div class="form-group">
									<label>นามหน่วยเต็ม</label>
									<input type="text" class="form-control" name="ACK_ID">
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="form-group">
									<label>นามหน่วยย่อ</label>
									<input type="text" class="form-control" name="ACK_NAME">
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>จว.ที่ตั้ง</label>
									<input type="text" class="form-control" name="UNIT_CODE">
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>ว/ด/ป อนุมัติ</label>
									<input type="text" class="form-control" name="UNIT_NAME">
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>รหัสหน่วย</label>
									<input type="text" class="form-control" name="UNIT_CODE_PARENT"
										value="<?=$UNIT_CODE?>" readonly>
								</div>
							</div>
							<input type="hidden" name="UNIT_ACM_ID" value="<?=$UNIT_ACM_ID?>">
							<div class="col-12 col-sm-5">
								<div class="form-group">
									<label>รหัสหน่วยกรมบัญชีกลาง</label>
									<input type="text" class="form-control" name="ACK_ESSENCE">
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>วัน-เวลา ณ ทำรายการล่าสุด</label>
									<input type="text" class="form-control" name="ACK_TIMESTAMP"
										value="<?=date('d/m/Y H:i:s') ?>" readonly>
								</div>
							</div>
							<div class="col-12 col-sm-2">
								<div class="form-group">
									<label>ผู้ทำรายการ</label>
									<input type="text" class="form-control" name="ACK_USER">
								</div>
							</div>
							<div class="col-12 col-sm-1">
								<div class="form-group">
									<label>เวอร์ชัน</label>
									<input type="text" class="form-control" name="ACK_VERSION" value="1" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</from>
		</div>
	</section>
    <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-primary">                                                        
                            <tr>
                                <th style="text-align: center;">ชั้นยศ</th>
                                    <?php
                                        include ('connectpdo.php');
                                            $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                            $stmt2=$db->prepare($sql2);
                                            $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                            $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                            $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                            $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                            $stmt2->execute();
                                            while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                if($ROST_RANK == "51" || $ROST_RANK == "21" || $ROST_RANK == "22" || $ROST_RANK == "19" || $ROST_RANK == "32"
                                                || $ROST_RANK == "23" || $ROST_RANK == "24" || $ROST_RANK == "25" ||$ROST_RANK == "26" || $ROST_RANK == "27"){
                                                    //echo '<th style="text-align: center;">รวม</th>';
                                                }else{
                                                    echo '<th style="text-align: center;">'.$ROST_RANKNAME.'</th>';
                                                }
                                                
                                            }
                                    ?>
                                <th style="text-align: center;">รวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <th class="bg-primary" style="width: 150px; text-align: center;">สัญญาบัตร</th>
                                    <?php
                                        include ('connectpdo.php');
                                            $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                            $stmt2=$db->prepare($sql2);
                                            $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                            $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                            $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                            $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                            $stmt2->execute();
                                            while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                if($ROST_RANK == "51" || $ROST_RANK == "21" || $ROST_RANK == "22" || $ROST_RANK == "19" || $ROST_RANK == "32"
                                                    || $ROST_RANK == "23" || $ROST_RANK == "24" || $ROST_RANK == "25" ||$ROST_RANK == "26" || $ROST_RANK == "27"){
                                                    //echo '<td style="width: 100px; text-align: center;">รวม</td>';
                                                }else{
                                                    echo '<td style="width: 150px; text-align: center;">'.$COUNT.'</td>';
                                                }
                                            }
                                    ?>
                                    <td style="width: 150px; text-align: center;">...</td>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                        <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-success">                                                        
                                    <tr>
                                        <th style="width: 150px; text-align: center;">ชั้นยศ</th>
                                            <?php
                                                include ('connectpdo.php');
                                                    $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                        WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                        GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                                    $stmt2=$db->prepare($sql2);
                                                    $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                                    $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                                    $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                                    $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                                    $stmt2->execute();
                                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                        if($ROST_RANK == "51" || $ROST_RANK == "01" || $ROST_RANK == "02" || $ROST_RANK == "03" || $ROST_RANK == "04" || $ROST_RANK == "05" ||$ROST_RANK == "06" || $ROST_RANK == "07"
                                                            || $ROST_RANK == "08" || $ROST_RANK == "09" || $ROST_RANK == "10" || $ROST_RANK == "11" || $ROST_RANK == "19" || $ROST_RANK == "32"){
                                                            //echo '<th style="text-align: center;">รวม</th>';
                                                        }else{
                                                            echo '<th style="width: 150px; text-align: center;">'.$ROST_RANKNAME.'</th>';
                                                        }
                                                        
                                                    }
                                            ?>
                                        <th style="width: 150px; text-align: center;">รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <tr>
                                            <th class="bg-success" style="width: 150px; text-align: center;">ประทวม</th>
                                            <?php
                                                include ('connectpdo.php');
                                                    $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                        WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                        GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                                    $stmt2=$db->prepare($sql2);
                                                    $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                                    $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                                    $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                                    $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                                    $stmt2->execute();
                                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                        if($ROST_RANK == "51" || $ROST_RANK == "01" || $ROST_RANK == "02" || $ROST_RANK == "03" || $ROST_RANK == "04" || $ROST_RANK == "05" ||$ROST_RANK == "06" || $ROST_RANK == "07"
                                                            || $ROST_RANK == "08" || $ROST_RANK == "09" || $ROST_RANK == "10" || $ROST_RANK == "11" || $ROST_RANK == "19" || $ROST_RANK == "32"){
                                                            //echo '<td style="width: 100px; text-align: center;">รวม</td>';
                                                        }else{
                                                            echo '<td style="width: 150px; text-align: center;">'.$COUNT.'</td>';
                                                        }
                                                    }
                                            ?>
                                            <td style="width: 150px; text-align: center;">...</td>
                                        </tr>
                                    </tr>
                                </tbody>
                        </table>
                        <table id="example1" class="table table-bordered table-striped">
                                <tbody>                                                        
                                    <tr>
                                        <th class="bg-success" style="width: 150px; text-align: center;">พลอาสาสมัคร</th>
                                        <?php
                                            include ('connectpdo.php');
                                               $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                    WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                    GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                                $stmt2=$db->prepare($sql2);
                                                $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                                $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                                $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                                $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                                $stmt2->execute();
                                                while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                    if($ROST_RANK == "51" || $ROST_RANK == "01" || $ROST_RANK == "02" || $ROST_RANK == "03" || $ROST_RANK == "04" || $ROST_RANK == "05" ||$ROST_RANK == "06" || $ROST_RANK == "07"
                                                            || $ROST_RANK == "08" || $ROST_RANK == "09" || $ROST_RANK == "10" || $ROST_RANK == "11" || $ROST_RANK == "19" || $ROST_RANK == "32" || $ROST_RANK == "21" 
                                                            || $ROST_RANK == "22" || $ROST_RANK == "23" || $ROST_RANK == "24" || $ROST_RANK == "25" || $ROST_RANK == "26" || $ROST_RANK == "27"){
                                                            //echo '<td style="width: 100px; text-align: center;">รวม</td>';
                                                    }
                                                    elseif($ROST_RANK == "31"){
                                                        echo '<td style="width: 150px; text-align: center;">'.$COUNT.'</td>';
                                                    }else{
                                                        echo '<td style="width: 150px; text-align: center;">-</td>';
                                                    }
                                                }
                                        ?>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <tr>
                                            <th class="bg-success" style="width: 150px; text-align: center;">พลทหาร</th>
                                            <?php
                                                include ('connectpdo.php');
                                                    $sql2 = "SELECT *,COUNT(ROST_ID) FROM j3_rost 
                                                        WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3 
                                                        GROUP BY ROST_RANKNAME ORDER BY ROST_RANK";
                                                    $stmt2=$db->prepare($sql2);
                                                    $stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
                                                    $stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
                                                    $stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
                                                    $stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
                                                    $stmt2->execute();
                                                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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
                                                        if($ROST_RANK == "51" || $ROST_RANK == "01" || $ROST_RANK == "02" || $ROST_RANK == "03" || $ROST_RANK == "04" || $ROST_RANK == "05" ||$ROST_RANK == "06" || $ROST_RANK == "07"
                                                            || $ROST_RANK == "08" || $ROST_RANK == "09" || $ROST_RANK == "10" || $ROST_RANK == "11" || $ROST_RANK == "19" || $ROST_RANK == "31" || $ROST_RANK == "21" 
                                                            || $ROST_RANK == "22" || $ROST_RANK == "23" || $ROST_RANK == "24" || $ROST_RANK == "25" || $ROST_RANK == "26" || $ROST_RANK == "27"){
                                                            //echo '<td style="width: 100px; text-align: center;">รวม</td>';
                                                        }
                                                        elseif($ROST_RANK == "32"){
                                                            echo '<td style="width: 150px; text-align: center;">'.$COUNT.'</td>';
                                                        }else{
                                                            echo '<td style="width: 150px; text-align: center;">-</td>';
                                                        }
                                                    }
                                            ?>
                                        </tr>
                                    </tr>
                                </tbody>
                        </table>
                    
                        </div>
						<!--<iframe
                            src="iframe_detail_ii_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE_1;?>&nickname=<?=$UNIT_CODE_2;?>&lastname=<?=$UNIT_CODE_3?>"
                            frameborder="0" width="100%" height="1000" scrolling="yes">
						</iframe>-->
					</div>
					<div id="Sturc1" class="tabcontent">
                        <div class="row">
                            <?php
                                $sql3 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :UNIT_CODE";
                                $stmt3=$db->prepare($sql3);
                                $stmt3->bindparam(':UNIT_CODE',$UNIT_CODE);
                                $stmt3->execute();
                                    $i = "0";
                                    while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
                                        $SUB1 = substr($row3['UNIT_CODE'],6);
                                        
                                        if($SUB1 != "0001" && $SUB1 != "0002" && $SUB1 != "0003" && $SUB1 != "9999" && $SUB1 != "9998"  && $SUB1 != "0900"){
                                            //echo '<div class="row">';
                                            if($row3['NRPT_UNIT_PARENT'] == $UNIT_CODE && $i == "0"){
                                                $UNIT3 = $row3['UNIT_CODE'];
                                                $i++;
                                                echo '
                                                <div class="col-md-6">
                                                    <div class="card card-outline card-success">
                                                        <div class="card-header">
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>รหัสหน่วย</label>
                                                                            <input type="text" class="form-control" value="'.$UNIT3.'" disabled>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>รหัสส่วนราชการ</label>
                                                                            <input type="text" class="form-control" value="" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group">
                                                                            <label>ลำดับที่</label>
                                                                            <input type="text" class="form-control" value="" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>รหัสหน่วยใหม่</label>
                                                                            <input type="text" class="form-control" value="'.$UNIT3.'" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <div class="form-group">
                                                                            <label>รหัสหน่วยขึ้นหน้าใหม่</label>
                                                                            <input type="text" class="form-control" value="" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>นามหน่วยเต็ม</label>
                                                                        <input type="text" class="form-control" name="NRPT_NAME" value="'.$row3['NRPT_NAME'].'" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>นามหน่วยย่อ</label>
                                                                        <input type="text" class="form-control" name="NRPT_ACM" value="'.$row3['NRPT_ACM'].'" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>นามหน่วยภาษาอังกฤ</label>
                                                                        <input type="text" class="form-control" name="UNIT_CODE" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>นามหน่วยภาษาอังกฤย่อ</label>
                                                                        <input type="text" class="form-control" name="UNIT_NAME" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                //echo $row3['NRPT_ACM'];
                                                /*$sql4 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :UNIT3" ;
                                                $stmt4=$db->prepare($sql4);
                                                $stmt4->bindparam(':UNIT3',$UNIT3);
                                                $stmt4->execute();
                                                $row4=$stmt4->fetch(PDO::FETCH_ASSOC);

                                                    //echo '<ul class="nav nav-treeview">';
                                                if($row4['NRPT_UNIT_PARENT'] == $UNIT3){
                                                    echo '<ul class="nav nav-treeview">
                                                            <li class="nav-item has-treeview">
                                                                <a href="unit_structure.php?id='.$UNIT3.'" class="nav-link">
                                                                    <i class="far fa-circle nav-icon"></i>
                                                                    <p>แสดงทั้งหมด</p>
                                                                </a>
                                                            </li>';
                                                    $stmt4->execute();
                                                    while($row4=$stmt4->fetch(PDO::FETCH_ASSOC)){
                                                        $SUB2 = substr($row4['UNIT_CODE'],6);
                                                        if($SUB2 != "0001" && $SUB2 != "0002" && $SUB2 != "0003" && $SUB2 != "9999" && $SUB2 != "9998"  && $SUB2 != "0900"){
                                                            if($row4['NRPT_UNIT_PARENT'] == $UNIT3){
                                                                $UNIT4 = $row4['UNIT_CODE'];
                                                                echo '<li class="nav-item">
                                                                        <a href="unit_structure.php?id='.$UNIT4.'" class="nav-link">
                                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                                            <p>'. $row4['NRPT_ACM'] .'</p>
                                                                        </a>';
                                                                $sql5 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :UNIT4" ;
                                                                $stmt5=$db->prepare($sql5);
                                                                $stmt5->bindparam(':UNIT4',$UNIT4);
                                                                $stmt5->execute();
                                                                $row5=$stmt5->fetch(PDO::FETCH_ASSOC);

                                                                //echo '<ul class="nav nav-treeview">';
                                                                if($row5['NRPT_UNIT_PARENT'] == $UNIT4){
                                                                    echo '<ul class="nav nav-treeview">
                                                                            <li class="nav-item has-treeview">
                                                                                <a href="unit_structure.php?id='.$UNIT4.'" class="nav-link">
                                                                                    <i class="far fa-circle nav-icon"></i>
                                                                                    <p>แสดงทั้งหมด</p>
                                                                                </a>
                                                                            </li>';
                                                                    $stmt5->execute();
                                                                    while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
                                                                        $SUB3 = substr($row3['UNIT_CODE'],6);
                                                                        if($SUB3 != "0001" && $SUB3 != "0002" && $SUB3 != "0003" && $SUB3 != "9999" && $SUB3 != "9998"  && $SUB3 != "0900"){
                                                                            if($row5['NRPT_UNIT_PARENT'] == $UNIT4){
                                                                                $UNIT5 = $row5['UNIT_CODE'];
                                                                                echo '<li class="nav-item">
                                                                                        <a href="unit_structure.php?id='.$UNIT5.'" class="nav-link">
                                                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                                                            <p>'. $row5['NRPT_ACM'] .'</p>
                                                                                        </a>';
                                                                                $sql6 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :UNIT5" ;
                                                                                $stmt6=$db->prepare($sql6);
                                                                                $stmt6->bindparam(':UNIT5',$UNIT5);
                                                                                $stmt6->execute();
                                                                                $row6=$stmt6->fetch(PDO::FETCH_ASSOC);

                                                                                if($row6['NRPT_UNIT_PARENT'] == $UNIT5){
                                                                                    echo '<ul class="nav nav-treeview">
                                                                                            <li class="nav-item has-treeview">
                                                                                                <a href="unit_structure.php?id='.$UNIT5.'" class="nav-link">
                                                                                                    <i class="far fa-circle nav-icon"></i>
                                                                                                    <p>แสดงทั้งหมด</p>
                                                                                                </a>
                                                                                            </li>';
                                                                                    $stmt6->execute();
                                                                                    while($row6=$stmt6->fetch(PDO::FETCH_ASSOC)){
                                                                                        if($row6['NRPT_UNIT_PARENT'] == $UNIT5){
                                                                                            $UNIT6 = $row6['UNIT_CODE'];
                                                                                            echo '<li class="nav-item">
                                                                                                    <a href="unit_structure.php?id='.$UNIT6.'" class="nav-link">
                                                                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                                                                        <p>'. $row6['NRPT_ACM'] .'</p>
                                                                                                    </a>
                                                                                                </li>';
                                                                                        }
                                                                                    }
                                                                                    echo '</ul>';
                                                                                }
                                                                                echo '</li>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo '</ul>';
                                                                }
                                                                echo '</li>';
                                                            }
                                                        }
                                                    }
                                                    echo '</ul>';
                                                }
                                                echo '</li>';*/
                                            }else{
                                                
                                                    if($row3['NRPT_UNIT_PARENT'] == $UNIT_CODE){
                                                        $UNIT3 = $row3['UNIT_CODE'];
                                                        $i--;
                                                        
                                                        echo '
                                                        <div class="col-md-6">
                                                            <div class="card card-outline card-info">
                                                                <div class="card-header">
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label>รหัสหน่วย</label>
                                                                                    <input type="text" class="form-control" value="'.$UNIT3.'" disabled>
                                                                                </div>
                                                                            </div>  
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label>รหัสส่วนราชการ</label>
                                                                                    <input type="text" class="form-control" value="" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <div class="form-group">
                                                                                    <label>ลำดับที่</label>
                                                                                    <input type="text" class="form-control" value="" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-group">
                                                                                    <label>รหัสหน่วยใหม่</label>
                                                                                    <input type="text" class="form-control" value="'.$UNIT3.'" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <div class="form-group">
                                                                                    <label>รหัสหน่วยขึ้นหน้าใหม่</label>
                                                                                    <input type="text" class="form-control" value="" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>นามหน่วยเต็ม</label>
                                                                                <input type="text" class="form-control" name="NRPT_NAME" value="'.$row3['NRPT_NAME'].'" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>นามหน่วยย่อ</label>
                                                                                <input type="text" class="form-control" name="NRPT_ACM" value="'.$row3['NRPT_ACM'].'" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>นามหน่วยภาษาอังกฤ</label>
                                                                                <input type="text" class="form-control" name="UNIT_CODE" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>นามหน่วยภาษาอังกฤย่อ</label>
                                                                                <input type="text" class="form-control" name="UNIT_NAME" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                
                                            }
                                            //echo '</div>';
                                        }
                                    }
                            ?>
                        </div>
                    </div>
					<div id="News1" class="tabcontent">
                        <iframe
                            src="iframe_unit_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE_1;?>&nickname=<?=$UNIT_CODE_2;?>&lastname=<?=$UNIT_CODE_3?>"
                            frameborder="0" width="100%" height="1000" scrolling="yes"></iframe>
                    </div>
				</div>			
        	</div>
    	</div>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2019 </strong>
        Multi Innovation Engineering Co.,Ltd
    </footer>


    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <style>
    * {
        box-sizing: border-box
    }

    /* Set height of body and the document to 100% */
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: #87cefa;
        color: black;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 20%;
    }

    .tablink:hover {
        background-color: #79CDCD;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: #555;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }
    </style>

<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>

    <?php
      include ('script.php');
    ?>

</body>

</html>