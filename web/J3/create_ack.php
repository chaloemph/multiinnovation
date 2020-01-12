<?php

date_default_timezone_set('Asia/Bangkok');
include ('connectpdo.php');
include ('connect.php');
$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$sql ="SELECT *,MAX(UNIT_CODE) as max FROM j3_nrpt WHERE UNIT_CODE = :UNIT_CODE";
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
	$MAX = $row['max'];
	

	$NRPT_NAME = explode(' ', $row['NRPT_NAME']); 
	$NRPT_NAME = $NRPT_NAME[0];

	$NRPT_ACM = explode('.', $row['NRPT_ACM']); 
	$NRPT_ACM = $NRPT_ACM[0];

}	
?>

<!DOCTYPE html>
<html>
<head>
	<?php
	include ('haed.php');
	?>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
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
						<form action="ct_create_ack.php" method="POST"> 
							<div class="card card-default">
								<div class="card-header">
									<div class="row">
										<div class="col-12 col-sm-2">
											<select class="form-control select2-single" name="PART_LIST" id="PART_LIST">
												<option selected>กรุณาเลือกส่วนงาน...</option>
												<?php
												$sql = "SELECT * FROM j3_part WHERE 1";
												$res = mysqli_query($conn, $sql);
												while($row= mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['PART_ID'].'"  >'.$row['PART_NAME'].'</option>';
												}
												?>

											</select>
										</div>
										<div class="col-12 col-sm-2">
											<select class="form-control select2-single" id="UNIT_ACM" name="UNIT_ACM">
												<option id="UNIT_ACM_LIST" selected>กรุณาเลือกส่วนงาน...</option>

											</select>
										</div>
										<div class="col-12 col-sm-2">
											<select class="form-control select2-single" id="UNIT_ACM_CREATE" name="UNIT_ACM_CREATE">
												<option selected>กรุณาเลือกสร้าง...</option>
												<option value="กรม">กรม</option>
												<option value="สำนัก">สำนัก</option>
												<option value="ศูนย์">ศูนย์</option>
												<option value="กอง">กอง</option>
												<option value="แผนก">แผนก</option>

											</select>
										</div>
										<div class="card-tool">
											<button class="btn btn-secondary" type="button"  data-toggle="modal" data-target=".modalMoveStructure" data-unit_code="<?=$UNIT_CODE;?>" data-nrpt_unit_parent="<?=$NRPT_UNIT_PARENT;?>"><i class="fas fa-spinner"></i>&nbsp;ย้ายโครงสร้าง</button>
											<button type="submit" class="btn btn-primary"><i class="fas fa-save"> บันทึกข้อมูล</i></button></button>
										</div>
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
												<input type="text" class="form-control" name="UNIT_NAME2" value="<?=$MAX?>">
											</div>
										</div>
										<div class="col-12 col-sm-3">
											<div class="form-group">
												<label>นามหน่วย</label>
												<input type="text" class="form-control" old-name="<?=$NRPT_NAME?>" name="UNIT_NAME" value="<?=$NRPT_NAME?>">
												<input type="hidden" class="form-control" name="UNIT_NAME_OLD" value="<?=$NRPT_NAME?>">
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>นามหน่วยย่อ</label>
												<input type="text" class="form-control" old-name="<?=$NRPT_ACM?>" name="UNIT_NAME_ACK" value="<?=$NRPT_ACM?>">
												<input type="hidden" class="form-control" name="UNIT_NAME_ACK_OLD" value="<?=$NRPT_ACM?>">
											</div>
										</div>
										<div class="col-12 col-sm-2">
											<div class="form-group">
												<label>หมายเลขหน่วยหลัก</label>
												<input type="text" class="form-control" name="UNIT_CODE_PARENT" value="<?=$UNIT_CODE?>" readonly>
											</div>
										</div>
										<input type="hidden" name="UNIT_ACM_ID" value="<?=$UNIT_ACM_ID?>">
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>เหตุผลความจำเป็น</label>
												<input type="text" class="form-control" name="ACK_ESSENCE" >
											</div>
										</div>
										<div class="col-12 col-sm-3">
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

		$('select[name="PART_ID"]').on('change', function () {
			$.ajax({
				type: "POST",
				url: "get_data.php",
				data: {PART_ID : $(this).val() , do:'get_j3_unit_acm'},
				dataType: "json",
				success: function (response) {
					$('#UNIT_ACM_ID').html($("<option>กรุณาเลือก...</option>"));
					$.each(response, function (indexInArray, valueOfElement) { 
						console.log(valueOfElement)
						$('#UNIT_ACM_ID').append($("<option></option>")
							.attr("value",valueOfElement["UNIT_ACM_ID"])
							.text(valueOfElement["UNIT_ACM_NAME"])); 

					});
				}
			});
		});
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

					$('select#PART_LIST').on('change', function () {
						$.ajax({
							type: "POST",
							url: "get_data.php",
							data: {do:'get_j3_unit_acm' , PART_ID:$(this).val()},
							dataType: "json",
							success: function (response) {
								console.log(response)
								$('select#UNIT_ACM').html($("<option>กรุณาเลือก...</option>"));
								$.each(response, function (indexInArray, valueOfElement) { 
									console.log(valueOfElement)
									$('select#UNIT_ACM').append($("<option></option>")
										.attr("value",valueOfElement["UNIT_ACM_ID"])
										.text(valueOfElement["UNIT_ACM_NAME"])); 

								});

							}
						});
					});


					$('select#UNIT_ACM_CREATE').on('change', function () {
						var UNIT_ACM_CREATE = $(this).val()
						if ( $('select#UNIT_ACM').val() != "" ) {
							$.ajax({
								type: "POST",
								url: "get_data.php",
								data: {do: 'get_max' , UNIT_ACM_CREATE : UNIT_ACM_CREATE, UNIT_CODE: $('select#UNIT_ACM').val() , UNIT_CODE_PARENT:$('input[name="UNIT_CODE_PARENT"]').val() },
								// dataType: "",
								success: function (response) {
									// console.log(response)
									$('input[name="UNIT_NAME2"]').val(response)
									$('input[name="UNIT_NAME2"]').attr('value' , response)
								}
							});
						}
					});


					$('form[action="ct_create_ack.php"]').submit(function (e) { 
						$.ajax({
							type: $(this).attr('method'),
							url: $(this).attr('action'),
							data: $(this).serialize(),
							// dataType: "dataType",
							success: function (response) {
								console.log(response)
							}
						});



						e.preventDefault();
					});


	            </script>
	        </body>
	        </html>