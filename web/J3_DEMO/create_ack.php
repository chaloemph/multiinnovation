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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
				<div class="card"><br>
					<section class="content">
						<div class="container-fluid">
							<form action="ct_create_ack.php" method="POST"> 
								<div class="card card-default">
									<div class="card-header">
										<h3 class="card-title">จัดทำข้อมูลอัตราเฉพาะกิจ</h3>
										<div class="card-tools">
										<button class="btn btn-secondary btn-sm my-2" type="button"  data-toggle="modal" data-target=".modalMoveStructure" data-unit_code="<?=$UNIT_CODE;?>" data-nrpt_unit_parent="<?=$NRPT_UNIT_PARENT;?>">
											<i class="fas fa-compress-alt"></i>
												ย้ายโครงสร้าง
											</button>

											<button type="submit" class="btn btn-info"><i class="fas fa-save"> บันทึกข้อมูล</i></button>
											<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
										</div>
									</div>     
									<div class="card-body">
										<div class="row">
											<div class="col-12 col-sm-2">
												<div class="form-group">
													<label>หมายเลขอัตราเฉพาะกิจ</label>
													<input type="text" class="form-control" name="ACK_ID">
												</div>
											</div>
											<div class="col-12 col-sm-3">
												<div class="form-group">
													<label>ชื่อหมายเลขอัตราเฉพาะกิจ</label>
													<input type="text" class="form-control" name="ACK_NAME" >
												</div>
											</div>
											<div class="col-12 col-sm-2">
												<div class="form-group">
													<label>หมายเลขหน่วย(ใหม่)</label>
													<input type="text" class="form-control" name="UNIT_NAME2" >
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
											<div class="col-12 col-sm-2">
												<div class="form-group">
													<label>หน่วยงาน</label>
													<select class="form-control select2" style="width: 100%;" name="UNIT_ACM_ID2">
														<option selected="selected"></option>
														<?php

														include 'connect.php';
														$sql2 = "SELECT * FROM j3_unit_acm";
														$res2 = mysqli_query($conn, $sql2);
														while($row2 = mysqli_fetch_assoc($res2)) {
															echo '<option value="'.$row2['UNIT_ACM_ID'].'">'.$row2['UNIT_ACM_NAME'].'</option>';                
														}

														?>  
													</select>
												</div>
											</div>
											<div class="col-12 col-sm-3">
												<div class="form-group">
													<label>เหตุผลความจำเป็น</label>
													<input type="text" class="form-control" name="ACK_ESSENCE" >
												</div>
											</div>
											<div class="col-12 col-sm-2">
												<div class="form-group">
													<label>วัน-เวลา ณ ทำรายการล่าสุด</label>
													<input type="text" class="form-control" name="ACK_TIMESTAMP" >
												</div>
											</div>
											<div class="col-12 col-sm-2">
												<div class="form-group">
													<label>ผู้ทำรายการ</label>
													<input type="text" class="form-control" name="ACK_USER" >
												</div>
											</div>
											<div class="col-12 col-sm-1">
												<div class="form-group">
													<label>เวอร์ชัน</label>
													<input type="text" class="form-control" name="ACK_VERSION" value="1" readonly>
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
													<textarea class="form-control" id="editor" rows="10" name="ACK_MISSION" style="border-width:1px; border-color: gray;"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleTextarea1"><h6>การแบ่งมอบ :</h6></label>
													<textarea class="form-control" id="editor1" rows="6" name="ACK_DISTRIBUTION" style="border-width:1px; border-color: gray;"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleTextarea1"><h6>ขอบเขตความรับผิดชอบและหน้าที่ :</h6></label>
													<textarea class="form-control" id="editor2" rows="6" name="ACK_SCOPE" style="border-width:1px; border-color: gray;"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleTextarea1"><h6>การแบ่งส่วนราชการและหน้าที่ :</h6></label>
													<textarea class="form-control" id="editor3" rows="6" name="ACK_DIVISION" style="border-width:1px; border-color: gray;"></textarea>
												</div>
											</div>

											<div id="News" class="tabcontent"> 
												<iframe src="iframe_p_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE_1;?>&nickname=<?=$UNIT_CODE_2;?>&lastname=<?=$UNIT_CODE_3?>" frameborder="0" width="100%" height="1000" scrolling="yes"></iframe>

											</div>

											<div id="Contact" class="tabcontent">
												<label for="exampleTextarea1"><h6>คำชี้แจง :</h6></label>
												<textarea class="form-control html-editor" id="editor4" rows="10" style="border-width:1px; border-color: gray;" name="ACK_EXPLANATION"></textarea>
											</div>

											<div id="About" class="tabcontent">
												<iframe src="iframe_i_ack.php" frameborder="0" width="100%" height="1000" scrolling="no"></iframe>
											</div>

											<div id="1About" class="tabcontent">
												<label for="exampleTextarea1"><h6>สรุปปะหน้า :</h6></label>
												<textarea class="form-control html-editor" id="editor5" rows="10" style="border-width:1px; border-color: gray;" name="ACK_SUMMARY"></textarea>
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

		<div class="modal fade modalMoveStructure" tabindex="-1" role="dialog" aria-labelledby="modalMoveStructureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              
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


	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
		$(function () {
		    // Summernote
		    $('.textarea').summernote()
		})
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
	            		// $('#example2').DataTable({
	            		// 	"paging": true,
	            		// 	"lengthChange": false,
	            		// 	"searching": false,
	            		// 	"ordering": true,
	            		// 	"info": true,
	            		// 	"autoWidth": false,
	            		// });

	            		$('button.tablink').on('click', function (event) {
	            			return false;
	            		});
	            	});


					$('.modalMoveStructure').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget) // Button that triggered the modal
						var nrpt_unit_parent = button.data('nrpt_unit_parent') 
						var unit_code = button.data('unit_code') 
						// var digit = unit_code.substring(0, 4);
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						$.ajax({
						type: "POST",
						url: "modalMoveStructure.php",
						data: {unit_code , nrpt_unit_parent },
						// dataType: "",
						success: function (response) {
							// console.log(response)
							modal.find('.modal-body').html(response)

							// $.ajax({
							// 	type: "POST",
							// 	url: "ct_create_ack.php",
							// 	data: $('form[action="ct_create_ack.php"]').serialize() ,
							// 	// dataType: "dataType",
							// 	success: function (response) {
							// 		console.log(response)

							// 		alert('ย้ายโครงสร้างเรียบร้อยแล้ว')
							// 		location.reload();
							// 	}
							// });
						}
						});
						
					})

					$('.modalMoveStructure').on('hidden.bs.modal', function (event) {
						$(this).find('.modal-body').removeClass('text-center')
					})
	            </script>
	        </body>
	        </html>
