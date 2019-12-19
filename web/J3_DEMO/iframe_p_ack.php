<?php

include ('connectpdo.php');
$UNIT_CODE = $_GET['id'];
$UNIT_CODE_1 = $_GET['name'];
$UNIT_CODE_2 = $_GET['nickname'];
$UNIT_CODE_3 = $_GET['lastname'];

$sql3 = "SELECT * FROM j3_rost WHERE ROST_ID = :ID";
$stmt3=$db->prepare($sql3);
$stmt3->bindparam(':ID',$ID);
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
<body>



	<button type="button" id="add_button" data-toggle="modal" data-target="#modal-xl" class="btn btn-icon btn btn-primary btn-sm"><i class="fas fa-plus"></i></button><br>      
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
				$stmt2=$db->prepare($sql2);
				$stmt2->bindparam(':UNIT_CODE',$UNIT_CODE);
				$stmt2->bindparam(':UNIT_CODE_1',$UNIT_CODE_1);
				$stmt2->bindparam(':UNIT_CODE_2',$UNIT_CODE_2);
				$stmt2->bindparam(':UNIT_CODE_3',$UNIT_CODE_3);
				$stmt2->execute();
				if ($stmt2->execute()){
                    // echo json_encode('success');
                }else{
                    echo json_encode($stmt2->errorInfo());
                }
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
						<td style="width: 180px; text-align: center;" valign="middle"><?=$ROST_CPOS?></td>
						<td style="width: 520px;"><?=$ROST_POSNAME?></td>
						<td style="width: 350px;"><?=$ROST_POSNAME_ACM?></td>
						<td style="width: 150px; text-align: center;" valign="middle"><?=$ROST_NCPOS12?></td>
						<td style="width: 40px; text-align: center;" valign="middle">        
							<div class="table-actions">
								<button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
							</div>
						</td>
					</tr>
				<?php } ?>                                                             
			</tbody>

		</table>
	</div>
</div>






<div class="modal fade" id="modal-xl">
	<div class="modal-dialog modal-xl">
		<form method="post" id="user_form" enctype="multipart/form-data" action="ct_create_p_ack.php">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-2">
							<label><b>หมายเลข อฉก.</b></label>
							<input type="text" class="form-control form-control-inverse" name="ACK_ID">
						</div>
						<div class="form-group col-md-3">
							<label><b>หมายเลขประจำตำแหน่ง</b></label>
							<input type="text" class="form-control form-control-inverse" id="ROST_CPOS" name="RATE_P_N_POS">
						</div>
						<div class="form-group col-md-4">
							<label><b>ตำแหน่งหน้าที่</b></label>
							<input type="text" class="form-control form-control-inverse" id="ROST_POSNAME" name="RATE_P_ROST_POSNAME">
						</div>
						<div class="form-group col-md-3">
							<label><b>ตำแหน่งหน้าที่(ย่อ)</b></label>
							<input type="text" class="form-control form-control-inverse" id="ROST_POSNAME_ACM" name="RATE_P_ROST_POSNAME_ACM">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label><b>หมายเลขหน่วย</b></label>
							<input type="text" class="form-control form-control-inverse" id="ROST_PARENT" name="ROST_PARENT">
						</div>
						<div class="form-group col-md-2">
							<label for="inputPassword4"><b>ชั้นยศ</b></label>
							<select class="form-control form-control-inverse" name="RATE_P_RANK">
								<option selected>กรุณาเลือก...</option>
								<option value="1">นายทหารสัญญาบัตร</option>
								<option value="2">นายทหารประทวน</option>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="inputPassword4"><b>กำเนิด</b></label>
							<select class="form-control form-control-inverse" name="RATE_P_RANK">
								<option selected></option>
								<option value="1"></option>
								<option value="2"></option>
							</select>
						</div>
						<div class="form-group col-md-2">
							<label><b>เหล่า</b></label>
							<select class="form-control form-control-inverse" name="RATE_P_THESE">
								<option value="1">ทบ.</option>
								<option value="2">ทอ.</option>
								<option value="3">ทร.</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label><b>เงินเดือนอัตรา</b></label>
							<select class="form-control form-control-inverse" name="SALARY_ID">
								<option selected>กรุณาเลือก...</option>
								<option value="1">นายทหารสัญญาบัตร</option>
								<option value="2">นายทหารประทวน</option>
							</select>
						</div>
					</div>    
					<div class="form-row">
						<div class="form-group col-md-9">
							<label><b>ชกท.</b></label>
							<input type="text" class="form-control form-control-inverse" name="EXPERT_MIL_ID">
						</div>
						<div class="form-group col-md-3">
							<label><b>ยอด (อัตรา)</b></label>
							<input type="text" class="form-control form-control-inverse" name="RATE_P_NUMBER">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label><b>หมายเหตุ</b></label>
							<textarea class="form-control form-control-inverse" name="RATE_P_REMARK" rows="4"></textarea>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<!--    <input type="hidden" name="AJY_ACK_ID" id="AJY_ACK_ID" /> -->
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="เพิ่มข้อมูล" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
				</div>
			</div>
		</form>
	</div>
</div>



<div class="modal fade" id="EditModal">
 <div class="modal-dialog modal-xl">
  <form method="post" id="user_form" enctype="multipart/form-data" action="ct_create_p_ack.php">
   <div class="modal-content">
    <div class="modal-header">
	 <!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewLastInsert">
	ดูข้อมูลที่เพิ่มล่าสุด
	</button>

     <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
     <input type="hidden" name="upd_id" id="upd_id">
     <div class="form-row">
      <div class="form-group col-md-2">
       <label><b>หมายเลข อฉก.</b></label>
       <input type="text" class="form-control form-control-inverse" name="ACK_ID">
      </div>
      <div class="form-group col-md-3">
       <label><b>หมายเลขประจำตำแหน่ง</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_CPOS">
      </div>
      <div class="form-group col-md-4">
       <label><b>ตำแหน่งหน้าที่</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_POSNAME">
      </div>
      <div class="form-group col-md-3">
       <label><b>ตำแหน่งหน้าที่(ย่อ)</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_POSNAME_ACM">
      </div>
     </div>
     <div class="form-row">
      <div class="form-group col-md-3">
       <label><b>หมายเลขหน่วยงานหลัก</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_PARENT">
      </div>
      <div class="form-group col-md-3">
       <label><b>หมายเลขหน่วยงานรอง</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_NUNIT">
      </div>
      <div class="form-group col-md-3">
       <label><b>หมายเลขกอง</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_NPARENT">
      </div>
      <div class="form-group col-md-3">
       <label><b>หมายเลขแผนก</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_UNIT">
      </div>
      <div class="form-group col-md-2">
       <label for="inputPassword4"><b>ชั้นยศ</b></label>
       <select class="form-control form-control-inverse" name="ROST_RANK">
        <option selected>กรุณาเลือก...</option>
        <?php
		include ('connect.php');
		$sql = "SELECT * FROM j1_rank";
		$res = mysqli_query($conn, $sql);
		while($row= mysqli_fetch_assoc($res)) {
			echo '<option value="'.$row['ROST_RANK'].'" data-ROST_LAO_MAJ="'.$row['ROST_RANKNAME'].'" data-ROST_CDEP="'.$row['ROST_CDEP'].'" >'.$row['ROST_RANKNAME'].'</option>';
		}
		?>
       </select>
      </div>
      <div class="form-group col-md-2">
       <label for="inputPassword4"><b>กำเนิด</b></label>
       <select class="form-control form-control-inverse" name="RATE_P_RANK">
        <option value="">กรุณาเลือก...</option>
        <?php
		$sql = "SELECT * FROM j3_rebirth";
		$res = mysqli_query($conn, $sql);
		while($row= mysqli_fetch_assoc($res)) {
			echo '<option value="'.$row['CLAO_NAME_SHORT'].'">'.$row['CLAO_NAME_FULL'].'</option>';
		}
		?>
       </select>
      </div>
      <div class="form-group col-md-2">
       <label><b>เหล่า</b></label>
       <select class="form-control form-control-inverse" name="ROST_LAO_MAJ">
	   <option value="">กรุณาเลือก...</option>
	    <option value="0">ทั่วไป</option>
        <option value="1">ทบ.</option>
        <option value="2">ทอ.</option>
        <option value="3">ทร.</option>
       </select>
      </div>
      <div class="form-group col-md-3">
       <label><b>เงินเดือนอัตรา</b></label>
       <select class="form-control form-control-inverse" name="SALARY_ID">
        <option value="">กรุณาเลือก...</option>
        <?php
		$sql = "SELECT * FROM j1_salary";
		$res = mysqli_query($conn, $sql);
		while($row= mysqli_fetch_assoc($res)) {
			echo '<option value="'.$row['CSAL_CODE'].'">'.$row['CSAL_RADUB'].' '.$row['CSAL_CHUN'].'</option>';
		}
		?>
       </select>
      </div>
      <div class="form-group col-md-3">
       <label><b>เลขกรมบัญชีกลาง</b></label>
       <input type="text" class="form-control form-control-inverse" name="ROST_NCPOS12">
      </div>
     </div>    
     <div class="form-row">
      <div class="form-group col-md-9">
       <label><b>ชกท.</b></label>
       <input type="text" class="form-control form-control-inverse" name="EXPERT_MIL_ID">
      </div>
      <div class="form-group col-md-3">
       <label><b>ยอด (อัตรา)</b></label>
       <input type="text" class="form-control form-control-inverse" name="RATE_P_NUMBER">
      </div>
     </div>
     <div class="form-row">
      <div class="form-group col-md-12">
       <label><b>หมายเหตุ</b></label>
       <textarea class="form-control form-control-inverse" name="RATE_P_REMARK" rows="4"></textarea>
      </div>

     </div>
    </div>
    <div class="modal-footer">
     <!--    <input type="hidden" name="AJY_ACK_ID" id="AJY_ACK_ID" /> -->
     <input type="hidden" name="operation" id="operation" />
     <input type="hidden" name="ROST_ID" id="ROST_ID" />
     <input type="submit" name="updatedata" id="action" class="btn btn-success" value="เพิ่มข้อมูล" />
     <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
    </div>
   </div>
  </form>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewLastInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ข้อมูลที่เพิ่มล่าสุด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <table id="lastdata" class="table table-bordered table-striped">
			<thead>                                                        
				<tr>
					<th style="text-align: center;">เลขประจำตำแหน่ง</th>
					<th>ชื่อตำแหน่ง</th>
					<th>ชื่อตำแหน่งเดิม</th>
					<th style="text-align: center;">หมายเลข 12 หลัก</th>
				</tr>
			</thead>
		</table>
      </div>
    </div>
  </div>
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


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

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
			<!-- amang -->
			<script>
				$(document).ready(function () {

					$('#EditModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget) // Button that triggered the modal
					var ROST_ID = button.data('id') // Extract info from data-* attributes
					var modal = $(this)
					
					$.ajax({
						type: "POST",
						url: "query.php",
						data: {rost_id:ROST_ID , do:'modal_edit_p_ack'},
						dataType: "json",
						success: function (response) {
							var arr_input_key = ['ACK_ID', 'ROST_CPOS', 'ROST_POSNAME'  , 'ROST_POSNAME_ACM' , 'ROST_NCPOS12', 'ROST_ID', 'ROST_PARENT', 'ROST_NUNIT', 'ROST_NPARENT' , 'ROST_UNIT' ]
							var arr_select_key = ['ROST_LAO_MAJ' , 'ROST_RANK' , 'CLAO_NAME_SHORT' ]
							$.each(response, function (indexInArray, valueOfElement) { 

								if (jQuery.inArray(indexInArray, arr_input_key) !== -1){
									if (valueOfElement != ''){
									modal.find('input[name="'+indexInArray+'"]').val(valueOfElement)
									}
								}

								if (jQuery.inArray(indexInArray, arr_select_key) !== -1){
									if (valueOfElement != ''){
										if (indexInArray == 'CLAO_NAME_SHORT'){
											modal.find('select[name="RATE_P_RANK"]').val(valueOfElement)
										}else{
											modal.find('select[name="'+indexInArray+'"]').val(valueOfElement)
										}
									}
								}
							});

							modal.find('#ROST_ID').val(ROST_ID)

							
						}
					});
					})
				});


				$('#EditModal form#user_form').on('submit', function (event) {
					var _this = $(this)
					$.ajax({
						type: "POST",
						url: "query.php",
						data: _this.serialize()+"&do=updatedata_p_ack",
						dataType: "json",
						success: function (response) {
							console.log(response)
							alert('บันทึกข้อมูลเรียบร้อยแล้ว')
						}
					});

					event.preventDefault()

				});

				$('#viewLastInsert').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget) 
					var modal = $(this)
					var editmodal = $('#EditModal')
					var ROST_CPOS = editmodal.find('input[name="ROST_CPOS"]').val()
					var ROST_PARENT = editmodal.find('input[name="ROST_PARENT"]').val()
					var ROST_NUNIT = editmodal.find('input[name="ROST_NUNIT"]').val()
					var ROST_NPARENT = editmodal.find('input[name="ROST_NPARENT"]').val()
					var ROST_UNIT = editmodal.find('input[name="ROST_UNIT"]').val()



					$.ajax({
						type: "POST",
						url: "query.php",
						data: {ROST_PARENT, ROST_NUNIT, ROST_NPARENT, ROST_UNIT , ROST_CPOS , do:'viewlast'},
						dataType: "json",
						success: function (response) {
							if (response){
								console.log(response)
								if ($.fn.DataTable.isDataTable('#lastdata')) {

										$('#lastdata').dataTable().fnClearTable();
										$('#lastdata').dataTable().fnDestroy();

										}

								LoadCurrentReport(response)
							}
						}
					});



				});

				function LoadCurrentReport(oResults) {
				var oTblReport = $("#lastdata")

				oTblReport.DataTable ({
					"data" : oResults,
					"searching": false,
					"bAutoWidth": false,
					"columns" : [
						{ "data" : "ROST_CPOS" },
						{ "data" : "ROST_POSNAME" },
						{ "data" : "ROST_POSTNAME_OLD"},
						{ "data" : "ROST_NCPOS12" }
					]
				});
				}
			</script>

        </body>
        </html>


