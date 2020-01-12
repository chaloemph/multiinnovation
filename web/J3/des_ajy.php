<?php

include ('connectpdo.php');

$AJY_NUM_ID = $_GET['id'];


$sql ="SELECT * FROM j3_ajy WHERE AJY_NUM_ID = :AJY_NUM_ID";
$stmt=$db->prepare($sql);
$stmt->bindparam(':AJY_NUM_ID',$AJY_NUM_ID);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$AJY_NUM_ID = $row['AJY_NUM_ID'];
$AJY_MISSION = $row['AJY_MISSION'];
$AJY_GRANT = $row['AJY_GRANT'];
$AJY_CAPABILITY = $row['AJY_CAPABILITY'];
$AJY_DIS_RATE = $row['AJY_DIS_RATE'];
$AJY_CONSUMPTION = $row['AJY_CONSUMPTION'];
$AJY_EXPLAN	 = $row['AJY_EXPLAN'];
$AJY_SUMMARY = $row['AJY_SUMMARY'];
$AJY_ID = $row['AJY_ID'];
$AJY_NAME = $row['AJY_NAME'];
$UNIT_CODE = $row['UNIT_CODE'];
$UNIT_NAME = $row['UNIT_NAME'];
$UNIT_NAME_ACK = $row['UNIT_NAME_ACK'];
$UNIT_CODE_PARENT = $row['UNIT_CODE_PARENT'];
$AJY_TIMESTAMP = $row['AJY_TIMESTAMP'];
$AJY_STS = $row['AJY_STS'];
$AJY_ESSENCE = $row['AJY_ESSENCE'];
$AJY_USER = $row['AJY_USER'];
$AJY_VERSION = $row['AJY_VERSION'];

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

									$sql2 = "SELECT AJY_MISSION,AJY_GRANT,AJY_CAPABILITY,AJY_DIS_RATE,AJY_CONSUMPTION,AJY_EXPLAN,AJY_SUMMARY FROM j3_ajy WHERE AJY_NUM_ID = :AJY_NUM_ID";
									$stmt2=$db->prepare($sql2);
									$stmt2->bindparam(':AJY_NUM_ID',$AJY_NUM_ID); 
									$stmt2->execute();
									$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
									$AJY_M = $row2['AJY_MISSION'];
									$AJY_G = $row2['AJY_GRANT'];
									$AJY_C = $row2['AJY_CAPABILITY'];
									$AJY_D = $row2['AJY_DIS_RATE'];
									$AJY_CO = $row2['AJY_CONSUMPTION'];
									$AJY_E = $row2['AJY_EXPLAN'];
									$AJY_S = $row2['AJY_SUMMARY'];
									?>

									<div id="Home" class="tabcontent">
										<div class="form-group">
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ภารกิจ :</font></label>
											<textarea class="form-control" id="editor" rows="4" name="ACK_MISSION" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_M?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">การแบ่งมอบ :</font></label>
											<textarea class="form-control" id="editor1" rows="4" name="ACK_DISTRIBUTION" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_G?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ขีดความสามารถ :</font></label>
											<textarea class="form-control" id="editor2" rows="4" name="ACK_SCOPE" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_C?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">อัตราลด :</font></label>
											<textarea class="form-control" id="editor3" rows="4" name="ACK_DIVISION" style="border-width:1px; border-color: gray;font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_D?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">ยุทโธปกรณ์ :</font></label>
											<textarea class="form-control" id="editor5" rows="4" name="ACK_DIVISION" style="border-width:1px; border-color: gray;font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_CO?></textarea>
										</div>
									</div>

									<div id="Sturc" class="tabcontent">
										<div style="text-align: center;">
											<?php

											$sql6 = "SELECT * FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE" ;
											$stmt6=$db->prepare($sql6);
											$stmt6->bindparam(':UNIT_CODE',$UNIT_CODE);
											$stmt6->execute();
											$row6=$stmt6->fetch(PDO::FETCH_ASSOC);

											$data = $row6['UNIT_CODE'];


												// output data of each row
											echo '<div class="tf-tree tf-gap-sm">
											<ul>
											<li>
											<span class="tf-nc">
											'. $row6['NRPT_ACM'] .'
											</span>';
											
											if($data == $UNIT_CODE){

												$sql5 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :data";
												$stmt5=$db->prepare($sql5);
												$stmt5->bindparam(':data',$data);
												$stmt5->execute();
												$row5=$stmt5->fetch(PDO::FETCH_ASSOC);

												if($row5['NRPT_UNIT_PARENT']==$data){
													echo '<ul>';
													$stmt5->execute();
													while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
														$parent = $row5['NRPT_UNIT_PARENT'];
														
														if($parent == $data){
															$send = $row5['UNIT_CODE'];
															
															echo '
															<li>
															<span class="tf-nc">
															'. $row5['NRPT_ACM'] .'
															</span>';
															
															$sql7 = "SELECT * FROM j3_nrpt WHERE NRPT_UNIT_PARENT = :send";
															$stmt7=$db->prepare($sql7);
															$stmt7->bindparam(':send',$send);
															$stmt7->execute();
															$row7=$stmt7->fetch(PDO::FETCH_ASSOC);
															
															if($row7['NRPT_UNIT_PARENT'] == $send){
																echo '<ul>';
																$stmt7->execute();
																while($row7=$stmt7->fetch(PDO::FETCH_ASSOC)){
																	$parent1 = $row7['NRPT_UNIT_PARENT'];
																	if($parent1 == $send){
																		
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
											}          
											echo '
											</li>
											</ul>
											</li>
											</ul>
											</div>';					
											?>
										</div>
									</div>

									<div id="News" class="tabcontent"> 
										<div class="card-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead class="bg-success">                                                        
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

													$sql2 = "SELECT * FROM j3_ratepersonal_ajy WHERE AJY_ID = :AJY_ID";
													$stmt2=$db->prepare($sql2);
													$stmt2->bindparam(':AJY_ID',$AJY_ID);
													$stmt2->execute();
													while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
														$AJY_RATE_P_NUM = $row2['AJY_RATE_P_NUM'];
														$ROST_CPOS = $row2['ROST_CPOS'];
														$EXPERT_MIL_ID = $row2['EXPERT_MIL_ID'];
														$AJY_RATE_P_REMARK = $row2['AJY_RATE_P_REMARK'];
														$AJY_RATE_P_NUMBER = $row2['AJY_RATE_P_NUMBER'];
														$AJY_RATE_P_RANK = $row2['AJY_RATE_P_RANK'];
														$SALARY_ID = $row2['SALARY_ID'];
														$AJY_ID = $row2['AJY_ID'];
														$AJY_RATE_P_VERSION = $row2['AJY_RATE_P_VERSION'];


														$sql3 = "SELECT * FROM j3_rost WHERE ROST_CPOS = :ROST_CPOS";
														$stmt3=$db->prepare($sql3);
														$stmt3->bindparam(':ROST_CPOS',$ROST_CPOS);
														$stmt3->execute();
														$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
														$ROST_UNIT = $row3['ROST_UNIT'];
														$ROST_CPOS = $row3['ROST_CPOS'];
														$ROST_POSNAME = $row3['ROST_POSNAME'];
														$ROST_POSNAME_ACM = $row3['ROST_POSNAME_ACM'];
														$ROST_RANK = $row3['ROST_RANK'];
														$ROST_RANKNAME = $row3['ROST_RANKNAME'];
														$ROST_LAO_MAJ = $row3['ROST_LAO_MAJ'];
														$ROST_NCPOS12 = $row3['ROST_NCPOS12'];
														$ROST_ID = $row3['ROST_ID'];
														$ROST_PARENT = $row3['ROST_PARENT'];	
														$ROST_NUNIT = $row3['ROST_NUNIT'];	
														$ROST_NPARENT = $row3['ROST_NPARENT'];		

														?>
														<tr>
															<td style="width: 180px; text-align: center;"><?=$ROST_CPOS?></td>
															<td style="width: 600px;"><?=$ROST_POSNAME?></td>
															<td style="width: 350px;"><?=$ROST_POSNAME_ACM?></td>
															<td style="width: 150px; text-align: center;"><?=$ROST_NCPOS12?></td>
															<td style="text-align: center;">        
																<div class="table-actions">
																	<button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
																	<a href='unit_structure_01.php?id=<?=$UNIT_CODE;?>'><button type="button" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-ban"></i></button></a>
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
											<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">คำชี้แจง :</font></label>
											<textarea class="form-control" id="editor4" rows="4" name="ACK_DIVISION" style="border-width:1px; border-color: gray;font-weight: bold; font-size: 18px;" DISABLED><?=$AJY_E?></textarea>
										</div>	
									</div>

									<div id="About" class="tabcontent">
										<div class="card-body">
											<table id="example2" class="table table-bordered table-striped">
												<thead class="bg-success">                                                        
													<tr>
														<th style="text-align: center;">หมายเลขตำแหน่ง</th>
														<th>หมายเลขสิ่งอุปกรณ์</th>
														<th>ชื่อสิ่งอุปกรณ์</th>
														<th style="text-align: center;">จำนวน</th>
														<th style="text-align: center;">หน่วยงานที่รับผิดชอบ</th>
														<th style="text-align: center;">Manage</th>
													</tr>
												</thead>
												<tbody>
													<?php

													include ('connectpdo.php');
													$sql8 = "SELECT * FROM j3_rateitem_ajy WHERE AJY_ID = :AJY_ID";
													$stmt8=$db->prepare($sql8);
													$stmt8->bindparam(':AJY_ID',$AJY_ID);
													$stmt8->execute();
													while($row8=$stmt8->fetch(PDO::FETCH_ASSOC)){
														$AJY_RATE_I_NUM = $row8['AJY_RATE_I_NUM'];
														$AJY_ID = $row8['AJY_ID'];
														$ROST_CPOS = $row8['ROST_CPOS'];
														$NSN_ID = $row8['NSN_ID'];
														$AJY_RATE_I_TOTAL = $row8['AJY_RATE_I_TOTAL'];
														$AJY_RATE_I_REMARK = $row8['AJY_RATE_I_REMARK'];
														$P_ID = $row8['P_ID'];
														$AJY_RATE_I_UPD_DATE = $row8['AJY_RATE_I_UPD_DATE'];
														$AJY_RATE_I_DEPARTMENT = $row8['AJY_RATE_I_DEPARTMENT'];

														?>
														<tr>
															<td style="width: 140px; text-align: center;"><?=$AJY_ID?></td>
															<td style="width: 200px;"><?=$NSN_ID?></td>
															<td style="width: 350px;"><?=$NSN_NAME?></td>
															<td style="width: 150px; text-align: center;"><?=$AJY_RATE_I_TOTAL?></td>
															<td style="width: 400px; text-align: center;"><?=$AJY_RATE_I_DEPARTMENT?></td>
															<td style="text-align: center;">        
																<div class="table-actions">
																	<button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
																	<a href='unit_structure_01.php?id=<?=$UNIT_CODE;?>'><button type="button" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-ban"></i></button></a>
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
													<th style="width: 260px;" class="table-success"><font style="font-size: 18px;">หมายเลข อจย. :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$AJY_ID?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">ชื่อหมายเลข อจย. :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$AJY_NAME?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">หมายเลขหน่วย(ใหม่) :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_CODE?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">นามหน่วย(ใหม่) :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_NAME?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">นามหน่วยย่อ(ใหม่) :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$UNIT_NAME_ACK?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">หมายเลขหน่วยหลัก :</font></th>
													<td><font style="font-size: 18px; font-weight: bold; text-overflow: ellipsis;"><?=$UNIT_CODE_PARENT?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">นามหน่วยหลัก :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;"><?=$ACM_PARENT?></font></td>
												</tr>
												<tr>
													<th class="table-success"><font style="font-size: 18px;">สถานะข้อมูล :</font></th>
													<td><font style="font-size: 18px; font-weight: bold;">


														<?php
														if($AJY_STS=="อนุมัติ"){
															echo "<font color='green'><b>$AJY_STS</b></font>";
														}else if($AJY_STS=="รอการอนุมัติ"){
															echo "<font color='orange'><b>$AJY_STS</b></font>";
														}else{
															echo "<font color='red'><b>$AJY_STS</b></font>";
														}            
														?>

													</font>
													<?php
													if($AJY_STS=="อนุมัติ"){
														echo "";
													}else if($AJY_STS=="รอการอนุมัติ"){
														echo "

														<a href='change_sts_1.php?id3=$AJY_NUM_ID'><button type='button' class='btn btn-icon btn-danger' style='float: right;' onClick=\"javascript:return confirm('ต้องการอนุมัติ '-'$AJY_ID'-');\" ><i class='fas fa-ban' ></i></button></a>

														<a href='change_sts_1.php?id2=$AJY_NUM_ID'><button type='button' class='btn btn-icon btn-success' style='float: right;' onClick=\"javascript:return confirm('ต้องการอนุมัติ '-'$AJY_ID'-');\"><i class='fas fa-check'></i></button></a>


														";
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

								$sql5 = "SELECT AJY_SUMMARY as SUMMARY FROM j3_ajy WHERE AJY_ID = :AJY_ID";
								$stmt5=$db->prepare($sql5);
								$stmt5->bindparam(':AJY_ID',$AJY_ID); 
								$stmt5->execute();
								$row5=$stmt5->fetch(PDO::FETCH_ASSOC);
								$SUMMARY = $row5['SUMMARY'];
								?>

								<div class="form-group">
									<label for="exampleTextarea1"><font style="font-weight: bold; font-size: 18px;">สรุปปะหน้า :</font></label>
									<textarea class="form-control" id="editor6" rows="13" name="ACK_SCOPE" style="border-width:1px; border-color: gray; font-weight: bold; font-size: 18px;" DISABLED><?=$SUMMARY?></textarea>
								</div>	
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<button type="button" class="btn btn-dark" style="height: 40px; width: 150px;" onclick="window.location.href='upd_ajy.php?id=<?=$AJY_NUM_ID?>'"><i class="ik ik-edit-2"></i>แก้ไขข้อมูล</button>
						<button type="button" class="btn btn-danger" style="height: 40px; width: 150px;" onclick="window.location.href='read_ajy.php'"><i class="ik ik-info"></i>ย้อนกลับ</button>
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
		background-color: #00FF7F;
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
