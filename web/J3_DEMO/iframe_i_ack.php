<?php
include ('connectpdo.php');
?>
<?php

include ('connectpdo.php');

$date = date_create();
$now = date_create()->format('Y-m-d H:i:s');
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
        <tr class="table">
          <th>เลขประจำยุทโธปกรณ์</th>
          <th>ชื่อยุทโธปกรณ์</th>
          <th>รหัส สป.</th>
          <th>อัตรา</th>
          <th>หน่วยงาน</th>
          <th>จัดการ</th>
        </tr>
      </thead>
      <tbody>
       <?php

       include ('connectpdo.php');
       $sql2 = "SELECT * FROM j3_rateitem";
       $stmt2=$db->prepare($sql2);
       $stmt2->execute();
       while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
        $RATE_I_NUM = $row2['RATE_I_NUM'];
        $ACK_ID = $row2['ACK_ID'];
        $RATE_I_NUM_POS = $row2['RATE_I_NUM_POS'];
        $NSN_ID = $row2['NSN_ID'];
        $NSN_NAME = $row2['NSN_NAME'];
        $RATE_I_TOTAL = $row2['RATE_I_TOTAL'];
        $RATE_I_REMARK = $row2['RATE_I_REMARK'];
        $P_ID = $row2['P_ID'];
        $RATE_I_UPD_DATE = $row2['RATE_I_UPD_DATE'];
        $RATE_I_DEPARTMENT = $row2['RATE_I_DEPARTMENT'];


        ?>
        <tr>
          <td><?=$RATE_I_NUM_POS?></td>
          <td><?=$NSN_NAME?></td>
          <td><?=$NSN_ID?></td>
          <td><?=$RATE_I_TOTAL?></td>
          <td><?=$RATE_I_DEPARTMENT?></td>
          <td>
            <div class="table-actions">
              <button type="button" id="link_modal" data-toggle="modal" data-target="#EditModal" data-id="<?=$ROST_ID;?>" class="btn btn-success btn-sm editbtn"><i class="fas fa-pencil-alt"></i></button></a>
              <a href='delete_data.php?id=<?=$RATE_I_NUM;?>'><button type="button" class="btn btn-danger btn-sm btntrash"><i class="fas fa-trash-alt"></i></button></a>
            </div>
          </td>
        </tr>                                                           
      </tbody>
    <?php } ?>  
  </table>
</div>
</div>

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <form method="post" id="user_form" enctype="multipart/form-data" action="ct_create_rate_i.php">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label><b>หมายเลข อจย./อฉก.</b></label>
              <input type="text" class="form-control form-control-inverse" id="AJY_ACK_ID" name="ACK_ID">
            </div>  
            <div class="form-group col-md-3">  	
              <label><b>เลขประจำตำแหน่ง</b></label>
              <input type="text" class="form-control form-control-inverse" id="RATE_I_NUM_POS" name="RATE_I_NUM_POS">
            </div>
            <div class="form-group col-md-6">
              <label><b>รหัสสิ่งอุปกรณ์</b></label>
              <input type="text" class="form-control form-control-inverse" id="NSN_ID" name="NSN_ID">
            </div>

          </div>
          <div class="form-row">
            <div class="form-group col-md-9">
             <label for="inputPassword4"><b>ชื่อยุทโธปกรณ์</b></label>
             <input type="text" class="form-control form-control-inverse" id="NSN_NAME" name="NSN_NAME">	
           </div>
           <div class="form-group col-md-3">
            <label><b>จำนวน (อัตรา)</b></label>
            <input type="text" class="form-control form-control-inverse" id="RATE_I_TOTAL" name="RATE_I_TOTAL">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label><b>ชื่อผู้ทำรายการ</b></label>
            <input type="text" class="form-control form-control-inverse" id="RATE_I_REMARK" name="P_ID">
          </div>                   
          <div class="form-group col-md-4">
            <label><b>หน่วยงานที่รับผิดชอบ</b></label>
            <input type="text" class="form-control form-control-inverse" id="RATE_I_REMARK" name="RATE_I_DEPARTMENT">
          </div>                   
          <div class="form-group col-md-4">
            <label><b>วัน-เวลาที่ทำรายการล่าสุด</b></label>
            <input type="text" class="form-control form-control-inverse" id="RATE_I_REMARK" name="RATE_I_UPD_DATE" value="<?=$now?>">
          </div>                   
        </div>     
        <div class="form-row">
          <div class="form-group col-md-12">
            <label><b>หมายเหตุ</b></label>
            <textarea class="form-control form-control-inverse" id="RATE_I_REMARK" name="RATE_I_REMARK" rows="6"></textarea>
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

