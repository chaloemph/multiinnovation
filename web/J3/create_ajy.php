<?php

include ('connectpdo.php');

date_default_timezone_set('Asia/Bangkok');

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
			<div class="card"><br>
				<section class="content">
					<div class="container-fluid">
						<form action="ct_create_ajy.php" method="POST"> 
							<div class="card card-default">
								<div class="card-header">
									<h3 class="card-title">จัดทำข้อมูลอัตราเฉพาะกิจ</h3>
									<div class="card-tools">
										<button type="submit" class="btn btn-info"><i class="fas fa-save"> บันทึกข้อมูล</i></button>
										<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
									</div>
								</div>     
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>หมายเลขอัตราการจัดยุทโธปกรณ์</label>
												<input type="text" class="form-control" name="AJY_ID">
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group">
												<label>ชื่อหมายเลขอัตราการจัดยุทโธปกรณ์</label>
												<input type="text" class="form-control" name="AJY_NAME" >
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>หมายเลขหน่วย(ใหม่)</label>
												<input type="text" class="form-control" name="UNIT_CODE" >
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group">
												<label>นามหน่วย</label>
												<input type="text" class="form-control" name="UNIT_NAME" >
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>นามหน่วยย่อ</label>
												<input type="text" class="form-control" name="UNIT_NAME_ACK" >
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>หมายเลขหน่วยหลัก</label>
												<input type="text" class="form-control" name="UNIT_CODE_PARENT" value="<?=$UNIT_CODE?>">
											</div>
										</div>
										<input type="hidden" name="UNIT_ACM_ID" value="<?=$UNIT_ACM_ID?>">
										<div class="col-12 col-sm-5">
											<div class="form-group">
												<label>เหตุผลความจำเป็น</label>
												<input type="text" class="form-control" name="AJY_ESSENCE" >
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>วัน-เวลา ณ ทำรายการล่าสุด</label>
												<input type="text" class="form-control" name="ACK_TIMESTAMP" value="<?=date('d/m/Y H:i:s') ?>" readonly>
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>ผู้ทำรายการ</label>
												<input type="text" class="form-control" name="AJY_USER" >
											</div>
										</div>
										<div class="col-12 col-sm-1">
											<div class="form-group">
												<label>เวอร์ชัน</label>
												<input type="text" class="form-control" name="AJY_VERSION" value="1" readonly>
											</div>
										</div>

									</div>
									<div class="card-body">
										<button class="tablink" onmouseover="openPage('Home', this, 'white')" >กล่าวทั่วไป</button>
										<button class="tablink" onmouseover="openPage('News', this, 'white')">อัตรากำลังพล</button>
										<button class="tablink" onmouseover="openPage('Contact', this, 'white')">คำชี้แจง</button>
										<button class="tablink" onmouseover="openPage('About', this, 'white')">อัตรายุทโธปกรณ์</button>
										<button class="tablink" onmouseover="openPage('1About', this, 'white')">สรุปปะหน้า</button>

										<div id="Home" class="tabcontent">
											<div class="form-group">
												<label for="exampleTextarea1"><h6>ภารกิจ :</h6></label>
												<textarea class="form-control" id="editor" rows="10" name="AJY_MISSION" style="border-width:1px; border-color: gray;"></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><h6>การแบ่งมอบ :</h6></label>
												<textarea class="form-control" id="editor1" rows="6" name="AJY_GRANT" style="border-width:1px; border-color: gray;"></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><h6>ขีดความสามารถ :</h6></label>
												<textarea class="form-control" id="editor2" rows="6" name="AJY_CAPABILITY" style="border-width:1px; border-color: gray;"></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><h6>อัตราลด :</h6></label>
												<textarea class="form-control" id="editor3" rows="6" name="AJY_DIS_RATE" style="border-width:1px; border-color: gray;"></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><h6>ยุทโธปกรณ์ :</h6></label>
												<textarea class="form-control" id="editor6" rows="4" name="AJY_CONSUMPTION" style="border-width:1px; border-color: gray;"></textarea>
											</div>
										</div>

										<div id="News" class="tabcontent"> 
											<iframe src="iframe_p_ajy.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE_1;?>&nickname=<?=$UNIT_CODE_2;?>&lastname=<?=$UNIT_CODE_3?>" frameborder="0" width="100%" height="1000" scrolling="yes"></iframe>

										</div>

										<div id="Contact" class="tabcontent">
											<label for="exampleTextarea1"><h6>คำชี้แจง :</h6></label>
											<textarea class="form-control html-editor" id="editor4" rows="10" style="border-width:1px; border-color: gray;" name="AJY_EXPLAN"></textarea>
										</div>

										<div id="About" class="tabcontent">
											<iframe src="iframe_i_ack.php" frameborder="0" width="100%" height="1000" scrolling="no"></iframe>
										</div>

										<div id="1About" class="tabcontent">
											<label for="exampleTextarea1"><h6>สรุปปะหน้า :</h6></label>
											<textarea class="form-control html-editor" id="editor5" rows="10" style="border-width:1px; border-color: gray;" name="AJY_SUMMARY"></textarea>
											<br>                                            
										</div>
									</div>
								</div>
							</div>
						</form>  
					</div>
				</div>
			</section>
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

	* {box-sizing: border-box}

	/* Set height of body and the document to 100% */
	body, html {
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

<?php
include ('script.php');
?>
</body>
</html>
