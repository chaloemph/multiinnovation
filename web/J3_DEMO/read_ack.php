<?php
include ('connectpdo.php');


$sql_c = "SELECT count(ACK_ID) as count FROM j3_ack";
$stmt_c=$db->prepare($sql_c);
$stmt_c->execute();
$row_c=$stmt_c->fetch(PDO::FETCH_ASSOC);
$count_1 = $row_c['count'];

$sql_c1 = "SELECT count(ACK_ID) as count FROM j3_ack WHERE ACK_STS = 'อนุมัติ'";
$stmt_c1=$db->prepare($sql_c1);
$stmt_c1->execute();
$row_c1=$stmt_c1->fetch(PDO::FETCH_ASSOC);
$count_2 = $row_c1['count'];

$sql_c2 = "SELECT count(ACK_ID) as count FROM j3_ack WHERE ACK_STS = 'รอการอนุมัติ'";
$stmt_c2=$db->prepare($sql_c2);
$stmt_c2->execute();
$row_c2=$stmt_c2->fetch(PDO::FETCH_ASSOC);
$count_3 = $row_c2['count'];

$sql_c3 = "SELECT count(ACK_ID) as count FROM j3_ack WHERE ACK_STS = 'ไม่อนุมัติ'";
$stmt_c3=$db->prepare($sql_c3);
$stmt_c3->execute();
$row_c3=$stmt_c3->fetch(PDO::FETCH_ASSOC);
$count_4 = $row_c3['count'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DIRECTORATE OF JOINT OPERATION</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="temp_index/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="temp_index/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="temp_index/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="temp_index/plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet" href="temp_index/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="temp_index/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="temp_index/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="temp_index/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="temp_index/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="index.php" class="brand-link">
				<span class="brand-text font-weight-light">RTARF</span>
			</a>
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">โครงสร้างการจัดหน่วย</li>
						<li class="nav-item has-treeview menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนบังคับบัญชา
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>
											สน.ผบ.ทสส.
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="create_unit.php" class="nav-link">
												<i class="fa fa-plus-square-o"></i>
												<p>สร้างใหม่</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สน.บก.บก.ทท</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สจร.ทหาร</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สธน.ทหาร</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สยย.ทหาร</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สลก.บก.ทท</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สตน.ทหาร</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>สสก.ทหาร</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="#" class="nav-link nav-link active">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>ศปร.</p>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนเสนาธิการร่วม
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="unit_structure.php?id=6110000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>กพ.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6120000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ขว.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6130000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ยก.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6140000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>กบ.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6160000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>กร.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6150000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>สส.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="unit_structure.php?id=6170000000" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>สปช.ทหาร</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนปฏิบัติการ
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>นทพ.</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ศรภ.</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ศตก.</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนกิจการพิเศษ
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>สบ.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>กง.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ผท.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ยบ.ทหาร</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>ชด.ทหาร</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนการศึกษา
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>สปท.</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-header">การจัดทำข้อมูล</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fa fa-bars"></i>
								<p>
									หมายเลข อจย./อฉก.
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="read_ajy.php" class="nav-link">
										<i class="fas fa-flag nav-icon"></i>
										<p>อัตราการจัดยุทโธปกรณ์</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="read_ack.php" class="nav-link">
										<i class="fas fa-flag nav-icon"></i>
										<p>อัตราการจัดเฉพาะกิจ</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</aside>
			<div class="content-wrapper">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-12">
								<div class="info-box">
									<span class="info-box-icon bg-info"><i class="fas fa-home"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">หมายเลขอัตราเฉพาะกิจทั้งหมด</span>
										<span class="info-box-number"><?=$count_1?></span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="info-box">
									<span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">หมายเลขอัตราเฉพาะกิจที่อนุมัติ</span>
										<span class="info-box-number"><?=$count_2?></span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="info-box">
									<span class="info-box-icon bg-warning"><i class="fas fa-exclamation-circle"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">หมายเลขอัตราเฉพาะกิจที่รอการอนุมัติ</span>
										<span class="info-box-number"><?=$count_3?></span>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-12">
								<div class="info-box">
									<span class="info-box-icon bg-danger"><i class="fas fa-ban"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">หมายเลขอัตราเฉพาะกิจที่ไม่ผ่านการอนุมัติ</span>
										<span class="info-box-number"><?=$count_4?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead class="bg-blue">
								<tr>
									<th style="text-align: center;">หมายเลข อฉก.</th>
									<th style="text-align: center;">หมายเลขหน่วย(ใหม่)</th>
									<th>นามหน่วย(ใหม่)</th>
									<th>นามหน่วยย่อ(ใหม่)</th>
									<th style="text-align: center;">Version</th>
									<th style="text-align: center;">สถานะ</th>
									<th style="text-align: center;"><i class="fas fa-cogs nav-icon"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php

								$sql = "SELECT * FROM j3_ack";
								$stmt=$db->prepare($sql);
								$stmt->execute();
								while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
									$ACK_NUM_ID = $row['ACK_NUM_ID'];
									$ACK_ID = $row['ACK_ID'];
									$ACK_MISSION = $row['ACK_MISSION'];
									$ACK_DISTRIBUTION = $row['ACK_DISTRIBUTION'];
									$ACK_ESSENCE = $row['ACK_ESSENCE'];
									$ACK_SCOPE = $row['ACK_SCOPE'];
									$ACK_DIVISION = $row['ACK_DIVISION'];
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

									?>
									<tr>
										<td style="width: 80px; text-align: center;"><?=$ACK_ID?></td>									
										<td style="width: 120px; text-align: center;"><?=$UNIT_CODE?></td>
										<td style="width: 350px;"><?=$UNIT_NAME?></td>
										<td style="width: 200px;"><?=$UNIT_NAME_ACK?></td>
										<td style="width: 20px; text-align: center;"><?=$ACK_VERSION?></td>
										<td style="width: 100px; text-align: center;">
											<?php

												if($ACK_STS=="อนุมัติ"){
													echo "<font color='green'><b>$ACK_STS</b></font>";
												}else if($ACK_STS=="รอการอนุมัติ"){
													echo "<font color='orange'><b>$ACK_STS</b></font>";
												}else{
													echo "<font color='red'><b>$ACK_STS</b></font>";
												}

											?>
										</td>
										<td style="width: 150px; text-align: center;">
											<a class="btn btn-info btn-sm" href="des_ack.php?id=<?=$ACK_NUM_ID?>">
												<i class="fas fa-pencil-alt">
												</i>
												DETAIL
											</a>
											<a class="btn btn-danger btn-sm" href="delete_data.php?ACK_NUM_ID=<?=$ACK_NUM_ID?>">
												<i class="fas fa-trash">
												</i>
												DELETE
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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

		<script src="temp_index/plugins/jquery/jquery.min.js"></script>
		<script src="temp_index/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script>
			$.widget.bridge('uibutton', $.ui.button)
		</script>
		<script src="temp_index/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="temp_index/plugins/chart.js/Chart.min.js"></script>
		<script src="temp_index/plugins/sparklines/sparkline.js"></script>
		<script src="temp_index/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="temp_index/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<script src="temp_index/plugins/jquery-knob/jquery.knob.min.js"></script>
		<script src="temp_index/plugins/moment/moment.min.js"></script>
		<script src="temp_index/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="temp_index/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<script src="temp_index/plugins/summernote/summernote-bs4.min.js"></script>
		<script src="temp_index/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<script src="temp_index/dist/js/adminlte.js"></script>
		<script src="temp_index/dist/js/pages/dashboard.js"></script>
		<script src="temp_index/dist/js/demo.js"></script>
		<script src="temp_index/plugins/jquery/jquery.min.js"></script>
		<script src="temp_index/plugins/datatables/jquery.dataTables.js"></script>
		<script src="temp_index/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

		<script>
			$(function () {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
				});
			});
		</script>
	</body>
	</html>
