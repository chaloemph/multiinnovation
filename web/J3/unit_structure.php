<?php

include ('connectpdo.php');

$UNIT_CODE = $_GET['id'];

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
        <div class="card-header">
          <h3 class="card-title">Function ค้นหา</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-secondary">
              <tr>
                <th style="text-align: center;">หมายเลขหน่วย</th>
                <th style="text-align: center;">หมายเลขหน่วยหลัก</th>
                <th>นามหน่วย</th>
                <th>นามหน่วยย่อ</th>
                <th style="text-align: center;">จัดทำข้อมูล</th>
                <th><i class="fas fa-cogs nav-icon"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = "SELECT * FROM j3_nrpt WHERE UNIT_ACM_ID = :UNIT_CODE OR NRPT_UNIT_PARENT = :UNIT_CODE OR UNIT_CODE=:UNIT_CODE";
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
               $UNIT_ACM_ID = $row['UNIT_ACM_ID'];


               ?>
               <tr>
                <td style="width: 160px; text-align: center;"><?=$UNIT_CODE?></td>
                <td style="width: 170px; text-align: center;"><?=$NRPT_UNIT_PARENT?></td>
                <td style="width: 500px;"><?=$NRPT_NAME?></td>
                <td style="width: 180px;"><?=$NRPT_ACM?></td>
                <td style="width: 130px; text-align: center;"> 
                  <a class="btn btn-success btn-sm" href="create_ajy.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE;?>&nickname=<?=$UNIT_CODE;?>&lastname=<?=$UNIT_CODE?>">
                    อจย.
                  </a>
                  <a class="btn btn-warning btn-sm" href="create_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE;?>&nickname=<?=$UNIT_CODE;?>&lastname=<?=$UNIT_CODE?>">
                    อฉก.
                  </a>
                </td>
                <td style="width: 220px; text-align: center;">
                  <a class="btn btn-primary btn-sm" href="unit.php?id=<?=$UNIT_CODE?>">
                    <i class="fas fa-list">
                    </i>
                    UNIT
                  </a>
                  <a class="btn btn-info btn-sm" href="detail_ack.php?id=<?=$UNIT_CODE;?>&name=<?=$UNIT_CODE;?>&nickname=<?=$UNIT_CODE;?>&lastname=<?=$UNIT_CODE?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    DETAIL
                  </a>
                  <a class="btn btn-danger btn-sm" href="delete_data.php?id=<?=$UNIT_CODE?>">
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
      <!-- /.card-body -->
    </div>
  </div>


  <footer class="main-footer">
    <strong>Copyright &copy; 2019 </strong>
    Multi Innovation Engineering Co.,Ltd
  </footer>


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<?php
include ('script.php');
?>

</body>
</html>
