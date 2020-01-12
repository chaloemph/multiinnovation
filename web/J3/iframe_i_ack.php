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
  <?php
  include ('haed.php');
  ?>
</head>
<body>



  <button type="button" id="add_button" data-toggle="modal" data-target="#modal-xl" class="btn btn-icon btn btn-primary btn-sm"><i class="fas fa-plus"></i></button><br>    
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead class="bg-primary">                                                        
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
          <td style="width: 180px; text-align: center;"><?=$RATE_I_NUM_POS?></td>
          <td><?=$NSN_NAME?></td>
          <td><?=$NSN_ID?></td>
          <td style="width: 40px; text-align: center;"><?=$RATE_I_TOTAL?></td>
          <td><?=$RATE_I_DEPARTMENT?></td>
          <td style="width: 40px; text-align: center;" valign="middle">
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


<?php
include ('script.php');
?>
</body>
</html>

