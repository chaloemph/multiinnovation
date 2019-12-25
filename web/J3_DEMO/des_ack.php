<?php

include ('connectpdo.php');

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

$sql1 = "SELECT NRPT_ACM FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE_PARENT";
$stmt1=$db->prepare($sql1);
$stmt1->bindparam(':UNIT_CODE_PARENT',$UNIT_CODE_PARENT);
$stmt1->execute();
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
	$ACM_PARENT = $row1['NRPT_ACM'];

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
	<link rel="stylesheet" href="temp_index/thy/scss/thy.css" >
	<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
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
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									ส่วนบังคับบัญชา
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item has-treeview">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>
											สน.ผบ.ทสส.
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
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
											<a href="#" class="nav-link">
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
				<div class="main-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<button class="tablink" onmouseover="openPage('Home', this, 'white')" ><font style="font-weight: bold; font-size: 18px;">กล่าวทั่วไป</font></button>
										<button class="tablink" onmouseover="openPage('Sturc', this, 'white')"><font style="font-weight: bold; font-size: 18px;">ผังการจัด</font></button>
										<button class="tablink" onmouseover="openPage('News', this, 'white')"><font style="font-weight: bold; font-size: 18px;">อัตรากำลังพล</font></button>
										<button class="tablink" onmouseover="openPage('Contact', this, 'white')"><font style="font-weight: bold; font-size: 18px;">คำชี้แจง</font></button>
										<button class="tablink" onmouseover="openPage('About', this, 'white')" ><font style="font-weight: bold; font-size: 18px;">อัตรายุทโธปกรณ์</font></button>
										
										<?php

										$sql2 = "SELECT ACK_MISSION,ACK_DISTRIBUTION,ACK_SCOPE,ACK_DIVISION,ACK_EXPLANATION FROM j3_ack WHERE ACK_NUM_ID = :ACK_NUM_ID";
										$stmt2=$db->prepare($sql2);
										$stmt2->bindparam(':ACK_NUM_ID',$ACK_NUM_ID); 
										$stmt2->execute();
										$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
										$ACK_M = $row2['ACK_MISSION'];
										$ACK_D = $row2['ACK_DISTRIBUTION'];
										$ACK_S = $row2['ACK_SCOPE'];
										$ACK_DV = $row2['ACK_DIVISION'];
										$ACK_E = $row2['ACK_EXPLANATION'];
										?>

										<div id="Home" class="tabcontent">
											<div class="form-group">
												<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ภารกิจ :</font></label>
												<textarea class="form-control" id="editor" rows="4" name="ACK_MISSION" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$ACK_M?></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">การแบ่งมอบ :</font></label>
												<textarea class="form-control" id="editor1" rows="4" name="ACK_DISTRIBUTION" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$ACK_D?></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ขอบเขตความรับผิดชอบและหน้าที่ :</font></label>
												<textarea class="form-control" id="editor2" rows="4" name="ACK_SCOPE" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$ACK_S?></textarea>
											</div>
											<div class="form-group">
												<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">การแบ่งส่วนราชการและหน้าที่ :</font></label>
												<textarea class="form-control" id="editor3" rows="4" name="ACK_DIVISION" style="border-width:1px; border-color: gray;font-weight: bold; font-size: 18px;" DISABLED><?=$ACK_DV?></textarea>
											</div>
										</div>

										<div id="Sturc" class="tabcontent">
											<?php

											$sql6 = "SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE" ;
											$stmt6=$db->prepare($sql6);
											$stmt6->bindparam(':UNIT_CODE',$UNIT_CODE);
											$stmt6->execute();
											$row6=$stmt6->fetch(PDO::FETCH_ASSOC);

											$data = $row6['UNIT_CODE'];

											$sql8 = "SELECT * FROM j3_nrpt" ;
											$stmt8=$db->prepare($sql8);
													//$stmt6->bindparam(':UNIT_CODE',$UNIT_CODE);
											$stmt8->execute();
											$row8=$stmt8->fetch(PDO::FETCH_ASSOC);

													// output data of each row
											echo '<div class="tf-tree tf-gap-sm">
											<ul>
											<li>
											<span class="tf-nc">
											'. $row6['NRPT_ACM'] .'
											</span>';
											
											if($data != $row8['UNIT_CODE']){
												echo '<ul>';
												while($row8=$stmt8->fetch(PDO::FETCH_ASSOC)){
													$parent = $row8['NRPT_UNIT_PARENT'];
													
													if($parent == $data){
														$send = $row8['UNIT_CODE'];
														
														echo '<li>
														<span class="tf-nc">
														'. $row8['NRPT_ACM'] .'
														</span>';
														
														$sql7 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :send";
														$stmt7=$db->prepare($sql7);
														$stmt7->bindparam(':send',$send);
														$stmt7->execute();
														
														if($row8['NRPT_NUNIT'] == $send){
															echo '<ul>';
															while($row7=$stmt7->fetch(PDO::FETCH_ASSOC)){
																$parent1 = $row7['NRPT_UNIT_PARENT'];
																if($parent1 == $send){
																								//$send2 = $row7['NRPT_ACM'];
																	
																	echo '<li>
																	<span class="tf-nc">
																	'. $row7['NRPT_ACM'] .'
																	</span>
																	</li>';
																	
																}
															}
															echo '</ul>';
														}
													}
												}
											}          
											echo '</ul>
											</li>
											</ul>
											</li>
											</ul>
											</div>';					
											?>
										</div>

										<div id="News" class="tabcontent"> 
											<div class="card-body">
												<table id="example1" class="table table-bordered table-striped">
													<thead>                                                        
														<tr>
															<th style="text-align: center;">เลขประจำตำแหน่ง</th>
															<th>ชื่อตำแหน่ง</th>
															<th>ตำแหน่งย่อ</th>
															<th style="text-align: center;">หมายเลข 12 หลัก</th>
															<th style="text-align: center;">Manage</th>
														</tr>
													</thead>
													<tbody>
														<?php

														include ('connectpdo.php');
														$sql2 = "SELECT * FROM j3_rost WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3";
													echo $sql2;
														$stmt2=$db->prepare($sql2);
														$stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
														$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
														$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
														$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
														$stmt2->execute();
														while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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

															?>
															<tr>
																<td style="width: 180px; text-align: center;"><?=$ROST_CPOS?></td>
																<td style="width: 500px;"><?=$ROST_POSNAME?></td>
																<td style="width: 350px;"><?=$ROST_POSNAME_ACM?></td>
																<td style="width: 150px; text-align: center;"><?=$ROST_NCPOS12?></td>
																<td>        
																	<div class="table-actions">
																		<button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
																		<a href='unit_structure_01.php?id=<?=$UNIT_CODE;?>'><button type="button" class="btn btn-icon btn-danger"><i class="ik ik-trash"></i></button></a>
																	</div>
																</td>
															</tr>
														<?php } ?>                                                             
													</tbody>
												</table>
											</div>
										</div>

										<div id="Contact" class="tabcontent">
											<div class="form-group">
												<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ภารกิจ :</font></label>
												<textarea class="form-control" id="editor4" rows="4" name="ACK_DIVISION" style="border-width:1px; border-color: gray;font-weight: bold; font-size: 18px;" DISABLED><?=$ACK_E?></textarea>
											</div>	
										</div>

										<div id="About" class="tabcontent">
											<div class="card-body">
												<table id="example2" class="table table-bordered table-striped">
													<thead>                                                        
														<tr>
															<th style="text-align: center;">เลขประจำตำแหน่ง</th>
															<th style="text-align: center;">ชื่อตำแหน่ง</th>
															<th style="text-align: center;">ตำแหน่งย่อ</th>
															<th style="text-align: center;">หมายเลข 12 หลัก</th>
															<th style="text-align: center;">Manage</th>
														</tr>
													</thead>
													<tbody>
														<?php

														include ('connectpdo.php');
														$sql2 = "SELECT * FROM j3_rost WHERE ROST_NPARENT = :UNIT_CODE OR ROST_NUNIT = :UNIT_CODE_1 OR ROST_UNIT = :UNIT_CODE_2 OR ROST_PARENT = :UNIT_CODE_3";
														$stmt2=$db->prepare($sql2);
														$stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
														$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
														$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
														$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
														$stmt2->execute();
														while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
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

															?>
															<tr>
																<td style="width: 180px; text-align: center;"><?=$ROST_CPOS?></td>
																<td style="width: 500px;"><?=$ROST_POSNAME?></td>
																<td style="width: 350px;"><?=$ROST_POSNAME_ACM?></td>
																<td style="width: 150px; text-align: center;"><?=$ROST_NCPOS12?></td>
																<td>        
																	<div class="table-actions">
																		<button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
																		<a href='unit_structure_01.php?id=<?=$UNIT_CODE;?>'><button type="button" class="btn btn-icon btn-danger"><i class="ik ik-trash"></i></button></a>
																	</div>
																</td>
															</tr>
														<?php } ?>                                                             
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">			
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="dt-responsive">
											<table id="lang-dt" class="table table-striped table-bordered nowrap">
												<tbody>
													<tr>
														<th style="width: 260px;" class="table-danger"><font style="font-size: 18px;">หมายเลขอัตราเฉพาะกิจ :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$ACK_ID?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">ชื่อหมายเลขอัตราเฉพาะกิจ :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$ACK_NAME?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">หมายเลขหน่วย(ใหม่) :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_CODE?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">นามหน่วย(ใหม่) :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_NAME?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">นามหน่วยย่อ(ใหม่) :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_NAME_ACK?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">หมายเลขหน่วยหลัก :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_CODE_PARENT?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">นามหน่วยหลัก :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;"><?=$ACM_PARENT?></font></td>
													</tr>
													<tr>
														<th class="table-danger"><font style="font-size: 18px;">สถานะข้อมูล :</font></th>
														<td><font style="font-size: 18px; font-weight: bold;">


															<?php
															if($ACK_STS=="อนุมัติ"){
																echo "<font color='green'><b>$ACK_STS</b></font>";
															}else if($ACK_STS=="รอการอนุมัติ"){
																echo "<font color='orange'><b>$ACK_STS</b></font>";
															}else{
																echo "<font color='red'><b>$ACK_STS</b></font>";
															}            
															?>

														</font>
														<?php
														if($ACK_STS=="อนุมัติ"){
															echo "";
														}else if($ACK_STS=="รอการอนุมัติ"){
															echo "<a href='change_sts_apv_ack.php?id=$ACK_ID'><button type='button' class='btn btn-icon btn-success' style='margin-left: 100px;' onClick=\"javascript:return confirm('ต้องการอนุมัติ '-'$ACK_NUM_ID'-');\"><i class='ik ik-check-circle'></i></button></a>

															<a href='change_sts_del_ack.php?id=$ACK_ID'><button type='button' class='btn btn-icon btn-danger' onClick=\"javascript:return confirm('ต้องการอนุมัติ '-'$ACK_NUM_ID'-');\" ><i class='ik ik-minus-circle' ></i></button></a>";
														}else{
															echo "";
														}            
														?>
													</td>
												</tr>

											</tbody>		      
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">

									<?php

									$sql5 = "SELECT ACK_SUMMARY as SUMMARY FROM j3_ack WHERE ACK_ID = :ACK_ID";
									$stmt5=$db->prepare($sql5);
									$stmt5->bindparam(':ACK_ID',$ACK_ID); 
									$stmt5->execute();
									$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
									$SUMMARY = $row5['SUMMARY'];
									?>

									<div class="form-group">
										<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">สรุปปะหน้า :</font></label>
										<textarea class="form-control" id="exampleTextarea1" rows="13" name="ACK_SCOPE" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$SUMMARY?></textarea>
									</div>	
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<button type="button" class="btn btn-dark" style="height: 40px; width: 150px;" onclick="window.location.href='upd_ack.php?id=<?=$ACK_ID?>'"><i class="ik ik-edit-2"></i>แก้ไขข้อมูล</button>
							<button type="button" class="btn btn-danger" style="height: 40px; width: 150px;" onclick="window.location.href='read_ack.php'"><i class="ik ik-info"></i>ย้อนกลับ</button>
						</div>
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

	* {box-sizing: border-box}

	/* Set height of body and the document to 100% */
	body, html {
		height: 100%;
		margin: 0;
		font-family: Arial;
	}

	/* Style tab links */
	.tablink {
		background-color: #555;
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
		ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>
	<script>
		ClassicEditor
		.create( document.querySelector( '#editor1' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>
	<script>
		ClassicEditor
		.create( document.querySelector( '#editor2' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>
	<script>
		ClassicEditor
		.create( document.querySelector( '#editor3' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>
	<script>
		ClassicEditor
		.create( document.querySelector( '#editor4' ) )
		.catch( error => {
			console.error( error );
		} );
	</script>
<script>
	function openPage(pageName,elmnt,color) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(pageName).style.display = "block";
		elmnt.style.backgroundColor = color;
	}

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>

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
